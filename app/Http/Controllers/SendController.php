<?php

namespace App\Http\Controllers;

use App\Services\Sms\SmsServiceInterface;
use App\Services\GeoIp\GeoIpServiceInterface;
use Illuminate\Http\Request;
use App\Http\Requests\SendRequest;
use App\Models\Send;
use App\Models\File;
use App\Models\User;
use App\Mail\SendProposal;
use App\Mail\SendProposalUser;
use Carbon\Carbon;

class SendController extends Controller
{
    protected $smsServiceInterface;
    protected $geoIpServiceInterface;

    public function __construct(
        SmsServiceInterface $smsServiceInterface,
        GeoIpServiceInterface $geoIpServiceInterface
    ) {
        $this->smsServiceInterface = $smsServiceInterface;
        $this->geoIpServiceInterface = $geoIpServiceInterface;
    }

    public function send(SendRequest $sendrequest)
    {
        if ($sendrequest->isMethod('post')) {
            $arrayRequest = $sendrequest->all();
            $sendDate = Send::create($arrayRequest);
            $arrayFile = [];

            foreach ($sendrequest->input('uploadedfiles') as $fileId) {
                $file = File::find($fileId);
                if ($file) {
                    $path = str_replace(public_path('files'), '', $file->filePath);
                    if (\Storage::disk('public-files')->exists($path)) {
                        $newFilename = time() . '_' . $file->fileName;
                        if (\Storage::disk('public-files')->move($path, 'mail/' . $newFilename)) {
                            $file->filePath = public_path('files/mail/' . $newFilename);
                            $file->fileUrl = \URL::asset('files/mail/' . $newFilename);
                            $file->fileName = $newFilename;
                            $file->send_id = $sendDate->id;
                            if ($file->save()) {
                                $arrayFile[] = $file->filePath;
                            }
                        };
                    }
                }
            }

            $users = User::all();
            foreach ($users as $user) {
                // Send email all managers
                // supervisor
                //\Mail::to($user)->queue(new SendProposal($sendrequest, $arrayFile));
                // $now = Carbon::now();
                // $startTime = Carbon::now()->hour($user->time_start)->minute(0)->second(0);
                // $stopTime = Carbon::now()->hour($user->time_stop)->minute(0)->second(0);

                // if ($now->between($startTime, $stopTime)) {
                //     \Mail::to($user)->queue(new SendProposal($sendrequest, $arrayFile));
                // } else {
                //     \Mail::to($user)->later($startTime->toDateTimeString(), new SendProposal($sendrequest, $arrayFile));
                // }

                \Mail::to($user)->send(new SendProposal($sendrequest, $arrayFile));

                $sms = "DZ";
                $sms .= " " . $sendrequest->input('firstName');
                $sms .= " " . $sendrequest->input('lastName');
                $sms .= " " . $this->geoIpServiceInterface->getCountryByIp($sendrequest->ip());
                $sms .= " " . $sendrequest->input('company', '');
                $sms .= " " . Carbon::now()->format("F j, Y, g:i a");

                if ($user->phone) {
                    $message = array(
                        "username" => config('smsservices.rocket.username'),
                        "password" => md5(config('smsservices.rocket.password')),
                        "phone" => "$user->phone",
                        "text" => $sms
                    );
                    $this->smsServiceInterface->sendRocketSMS($message);
                }
            }
            
            // Send email all managers !!queue!!
            // Install Supervisor and add task https://laravel.com/docs/5.4/queues#supervisor-configuration

            // \Mail::to($users->shift())
            // ->bcc($users->all())
            // ->queue(new SendProposal($sendrequest, $arrayFile));
            // Send email user
            // \Mail::to($sendrequest->input('email'))->queue(new SendProposalUser($sendrequest));

            // Send email user
            \Mail::to($sendrequest->input('email'))->send(new SendProposalUser($sendrequest));

            return redirect()->to("ok-page");
        }
    }

    public function success()
    {
        return view('email.success');
    }
}

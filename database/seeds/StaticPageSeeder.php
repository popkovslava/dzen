<?php

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\MainMenu;
use App\Models\ImgGallery;
use App\Models\Gallery;
use App\Models\link;
use App\Models\BannerBottom;
use App\Models\Stack;
use App\Models\StackCategory;
use App\Models\CountStacks;
use App\Models\Work;
use App\Models\Video;
use App\Models\VideoCategory;
use App\Models\LinkCount;
use App\Models\ClientsSection;
use App\Models\ClientsSectionCategory;
use App\Models\Config;
use App\Models\KeyConfig;



class StaticPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * CategoryClient
         */

        $CategoryClient = ClientsSectionCategory::create([
            'title' => 'CategoryClient'
        ]);

        /**
         * ClientSection
         */

        $Client1 = ClientsSection::create([
            'name' => 'Ivan Ivanov',
            'public' => 1,
            'description' => 'Seo | Media Group',
            'text'=> "I'm very happy with the way we communicate... The quality they've been delivering is exceptional... Their deliverables always being on time... I really recommend you try them.",
            'alt' => 'Ivan Ivanov',
            'link_in' => 'https://www.instagram.com/?hl=ru',
            'link_fb' => 'https://www.facebook.com/',
            'clients_section_category_id' => $CategoryClient->id
        ]);

        $Client2 = ClientsSection::create([
            'name' => 'Petr Petrov',
            'public' => 1,
            'description' => 'Site | Main Group',
            'text' => "We're satisfied with Dzensoft as our service provider.",
            'alt' => 'Petr Petrov',
            'link_in' => 'https://www.instagram.com/?hl=ru',
            'link_fb' => 'https://www.facebook.com/',
            'clients_section_category_id' => $CategoryClient->id
        ]);

        $Client3 = ClientsSection::create([
            'name' => 'Kline Kliner',
            'public' => 1,
            'description' => 'Save | Test Group',
            'text' => "We work with Dzensoft more than 3 years... Dzensoft made large-scale poject... and ten promo projects... I can recommend them as reliable partner..",
            'alt' => 'Kline Kliner',
            'link_in' => 'https://www.instagram.com/?hl=ru',
            'link_fb' => null,
            'clients_section_category_id' => $CategoryClient->id
        ]);

        $Client4 = ClientsSection::create([
            'name' => 'Slon Slonov',
            'public' => 1,
            'description' => 'Janer | jane Group',
            'text' => "I'm very happy with the way we communicate... The quality they've been delivering is exceptional... Their deliverables always being on time... I really recommend you try them.",
            'alt' => 'Ivan Ivanov',
            'link_in' => null,
            'link_fb' => null,
            'clients_section_category_id' => $CategoryClient->id
        ]);

        /**
         * CategoryVideo
         */

        $VideoCategory1 = VideoCategory::create([
            'title' => 'Hear from our clients'
        ]);

        $VideoCategory2 = VideoCategory::create([
            'title' => 'Hear from our clients2'
        ]);

        /**
         * Video
         */

        Video::create([
            'title'=> 'Company name1',
            'url' => 'KEHk6F6i5Dk',
            'description' => 'The Axel Springer AG is a leading integrated multimedia company in Europe, offering a considerable number of print and digital media.',
            'public' => 1,
            'video_category_id' => $VideoCategory1->id
        ]);

        Video::create([
            'title'=> 'Company name2',
            'url' => 'KEHk6F6i5Dk',
            'description' => 'The Axel Springer AG is a leading integrated multimedia company in Europe, offering a considerable number of print and digital media.',
            'public' => 1,
            'video_category_id' => $VideoCategory1->id
        ]);

        Video::create([
            'title' => 'Company name3',
            'url' => 'U8j9ky1gd-A',
            'description' => 'The Axel Springer AG is a leading integrated multimedia company in Europe, offering a considerable number of print and digital media',
            'public' => 1,
            'video_category_id' => $VideoCategory1->id
        ]);

        Video::create([
            'title'=> 'Company name4',
            'url' => 'KEHk6F6i5Dk',
            'description' => 'The Axel Springer AG is a leading integrated multimedia company in Europe, offering a considerable number of print and digital media',
            'public' => 1,
            'video_category_id' => $VideoCategory2->id
        ]);

        Video::create([
            'title'=> 'Company name5',
            'url' => 'U8j9ky1gd-A',
            'description' => 'The Axel Springer AG is a leading integrated multimedia company in Europe, offering a considerable number of print and digital media',
            'public' => 1,
            'video_category_id' => $VideoCategory2->id
        ]);

        Video::create([
            'title'=> 'Company name6',
            'url' => 'KEHk6F6i5Dk',
            'description' => 'The Axel Springer AG is a leading integrated multimedia company in Europe, offering a considerable number of print and digital media',
            'public' => 1,
            'video_category_id' => $VideoCategory2->id
        ]);

        /**
         * BannerBottom
         */

        $BannerBottomMain = BannerBottom::create([
               'title' => 'main',
               'description' => 'We help our clients shape projects that users lo'
        ]);

        $BannerBottomTop2 = BannerBottom::create([
            'title' => 'top2',
            'description' => 'We know that finding talented and efficient specialists to fit your needs and budget is no picnic. That\'s why our clients appreciate our services so much.'
        ]);

        $BannerBottomWhyWhy = BannerBottom::create([
            'title' => 'why-why',
            'description' => 'Along with excellent value, we provide a great team and stellar service without the hassles of hiring an in-house specialist.'
        ]);

        $BannerWhyHow = BannerBottom::create([
            'title' => 'WhyHow',
            'description' => '
            Along with excellent value, we provide a great team and stellar service without the hassles of hiring an in-house specialist.'
        ]);

        $BannerWhyWhat = BannerBottom::create([
            'title' => 'WhyWhat',
            'description' => 'Along with excellent value, we provide a great team and stellar service without the hassles of hiring an in-house specialist.'
        ]);

        $BannerBottomClient = BannerBottom::create([
            'title' => 'clients',
            'description' => ' Along with excellent value, we provide a great team and stellar service without the hassles of hiring an in-house specialist.'
        ]);

        $BannerBottomOurWorks = BannerBottom::create([
            'title' => 'OurWorks',
            'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'
        ]);

        $BannerBottomCareer = BannerBottom::create([
            'title' => 'career',
            'description' => 'We Love Our People.'
        ]);

        /**
         * Stack
         */

        $PHP = Stack::create([
            'title' => 'PHP',
            'type' => 'backend',
        ]);

        $HTMl = Stack::create([
            'title' => 'HTMl',
            'type' => 'frontend'
        ]);

        $JAVA = Stack::create([
            'title' => 'JAVA',
            'type' => 'backend'
        ]);

        $REACT = Stack::create([
            'title' => 'REACT',
            'type' => 'frontend'
        ]);

        $JS = Stack::create([
            'title' => 'JS',
            'type' => 'frontend'
        ]);

        $LARAVEL = Stack::create([
            'title' => 'LARAVEL',
            'type' => 'backend'
        ]);

        $SYMFONY = Stack::create([
            'title' => 'SYMFONY',
            'type' => 'backend'
        ]);

        $CSS = Stack::create([
            'title' => 'CSS',
            'type' => 'frontend'
        ]);

        /**
         * StackCategory
         */

        $StackCategory1 = StackCategory::create([
            'title' => 'StackCategory1',
        ]);

        $StackCategory2 = StackCategory::create([
            'title' => 'StackCategory2',
        ]);

        $StackCategory3 = StackCategory::create([
            'title' => 'StackCategory3',
        ]);

        $StackCategory4 = StackCategory::create([
            'title' => 'StackCategory4',
        ]);

        /**
         * StackCategory
         */

        CountStacks::create([
            'stack_category_id' => 1,
            'stack_id' => 1,
        ]);

        CountStacks::create([
            'stack_category_id' => 1,
            'stack_id' => 2,
        ]);

        CountStacks::create([
            'stack_category_id' => 1,
            'stack_id' => 3,
        ]);

        CountStacks::create([
            'stack_category_id' => 1,
            'stack_id' => 4,
        ]);

        CountStacks::create([
            'stack_category_id' => 1,
            'stack_id' => 5,
        ]);

        CountStacks::create([
            'stack_category_id' => 1,
            'stack_id' => 5,
        ]);

        CountStacks::create([
            'stack_category_id' => 2,
            'stack_id' => 1,
        ]);

        CountStacks::create([
            'stack_category_id' => 2,
            'stack_id' => 2,
        ]);

        CountStacks::create([
            'stack_category_id' => 2,
            'stack_id' => 3,
        ]);

        CountStacks::create([
            'stack_category_id' => 3,
            'stack_id' => 1,
        ]);

        CountStacks::create([
            'stack_category_id' => 3,
            'stack_id'=>2,
        ]);

        CountStacks::create([
            'stack_category_id' => 3,
            'stack_id' => 3,
        ]);

        CountStacks::create([
            'stack_category_id' => 4,
            'stack_id' => 4,
        ]);

        CountStacks::create([
            'stack_category_id' => 4,
            'stack_id'=>5,
        ]);

        /**
         * Galleries
         */

        $GalleryMain = Gallery::create([
            'title' => 'Main'
        ]);

        $GalleryWhyWhy = Gallery::create([
            'title' => 'WhyWhy'
        ]);

        $GalleryWhyHow = Gallery::create([
            'title' => 'WhyHow'
        ]);

        $GalleryWhyWhat = Gallery::create([
            'title' => 'WhyWhat'
        ]);

        $GalleryClients = Gallery::create([
            'title' => 'Clients'
        ]);

        $GalleryOurWorks = Gallery::create([
            'title' => 'OurWorks'
        ]);

        $GalleryTopToo = Gallery::create([
            'title' => 'Why we hire only top 2%?'
        ]);

        $CareerGallery = Gallery::create([
            'title' => 'Learn. Play. Create remarkable things.'
        ]);

        $GallerySlide1 = Gallery::create([
            'title' => 'GallerySlide1'
        ]);

        /**
         * Works
         */

        $Works1 = Work::create([
            'title_single' => 'Work1',
            'title1' => 'title1',
            'text1' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'title2' => 'title2',
            'text2' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'title3' => 'title3',
            'text3' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'gallery_id_1' => $GallerySlide1->id,
            'gallery_id_2' => $GallerySlide1->id,
            'gallery_id_3' => $GallerySlide1->id,
            'stack_category_id' => $StackCategory1->id
        ]);

        $Works2 = Work::create([
            'title_single' => 'Work2',
            'title1' => 'title1',
            'text1' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'title2' => 'title2',
            'text2' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'title3' => 'title3',
            'text3' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'gallery_id_1' => $GallerySlide1->id,
            'gallery_id_2' => $GallerySlide1->id,
            'gallery_id_3' => $GallerySlide1->id,
            'stack_category_id' => $StackCategory1->id
        ]);

        $Works3 = Work::create([
            'title_single' => 'Work3',
            'title1' => 'title1',
            'text1' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'title2' => 'title2',
            'text2' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'title3' => 'title3',
            'text3' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'gallery_id_1' => $GallerySlide1->id,
            'gallery_id_2' => $GallerySlide1->id,
            'gallery_id_3' => $GallerySlide1->id,
            'stack_category_id' => $StackCategory2->id
        ]);

        $Works4 = Work::create([
            'title_single' => 'Work3',
            'title1' => 'title1',
            'text1' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'title2' => 'title2',
            'text2' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'title3' => 'title3',
            'text3' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'gallery_id_1' => $GallerySlide1->id,
            'gallery_id_2' => $GallerySlide1->id,
            'gallery_id_3' => $GallerySlide1->id,
            'stack_category_id' => $StackCategory3->id
        ]);

        /**
         * Static pages
         */

        $PageMain = Page::create([
            'gallery_id' => $GalleryMain->id,
            'title' => 'Main',
            'slug' => 'main',
            'description' => 'description index',
            'keywords' => null,
            'main_page'=>true,
            'text' => 'text',
            'banner_bottom_id' => $BannerBottomMain->id,
            'video_category_id' => $VideoCategory1->id,
            'clients_section_category_id' => $CategoryClient->id
        ]);

        $PageWhy = Page::create([
            'gallery_id' => $GalleryWhyWhy->id,
            'title' => 'why-why',
            'slug' => 'why-why',
            'description' => 'description why-why',
            'keywords' => null,
            'text' => 'text',
            'banner_bottom_id'=> $BannerBottomWhyWhy->id,
            'video_category_id' => $VideoCategory1->id,
            'clients_section_category_id' => $CategoryClient->id
        ]);

        Page::create([
            'gallery_id' =>$GalleryWhyHow->id,
            'title' => 'why-how',
            'slug' => 'why-how',
            'description' => 'description why-how',
            'keywords' => null,
            'text' => 'text',
            'banner_bottom_id'=> $BannerWhyHow->id,
            'video_category_id' => $VideoCategory2->id,
            'clients_section_category_id' => $CategoryClient->id
        ]);

        Page::create([
            'gallery_id' => $GalleryWhyWhat->id,
            'title' => 'why-what',
            'slug' => 'why-what',
            'description' => 'description why-what',
            'keywords' => null,
            'text' => 'text',
            'banner_bottom_id' => $BannerWhyWhat->id,
            'video_category_id' => $VideoCategory2->id,
            'clients_section_category_id' => $CategoryClient->id
        ]);

        $PageOurWorks = Page::create([
            'gallery_id' => $GalleryOurWorks->id,
            'title' => 'our-works',
            'slug' => 'our-works',
            'description' => 'description our-works',
            'keywords' => null,
            'text' => 'text',
            'banner_bottom_id' => $BannerBottomOurWorks->id,
            'video_category_id' => $VideoCategory1->id,
            'clients_section_category_id' => $CategoryClient->id,
        ]);

        $PageTopToo= Page::create([
            'gallery_id' => $GalleryTopToo->id,
            'title' => 'top2',
            'slug' => 'top2',
            'description' => 'description top2',
            'keywords' => null,
            'text' => 'text',
            'banner_bottom_id'=> $BannerBottomTop2->id,
            'video_category_id' => $VideoCategory1->id,
            'clients_section_category_id' => $CategoryClient->id
        ]);

        $PageClients = Page::create([
            'gallery_id' => $GalleryClients->id,
            'title' => 'clients',
            'slug' => 'clients',
            'description' => 'description clients',
            'keywords' => null,
            'text' => 'text',
            'banner_bottom_id' => $BannerBottomClient->id,
            'video_category_id' => $VideoCategory1->id,
            'clients_section_category_id' => $CategoryClient->id
        ]);

        $PageCareer = Page::create([
            'gallery_id' => $GalleryClients->id,
            'title' => 'career',
            'slug' => 'career',
            'description' => 'description career',
            'keywords' => null,
            'text' => 'text',
            'banner_bottom_id' => $BannerBottomCareer->id,
            'video_category_id' => $VideoCategory1->id
        ]);

       $GetProposal = Page::create([
           'gallery_id' => null,
           'title' => 'get-proposal',
           'slug' => 'get-proposal',
           'description' => 'description get-proposal',
           'keywords' => null,
           'text' => 'text',
           'video_category_id' => $VideoCategory1->id,
           'clients_section_category_id' => $CategoryClient->id
       ]);

       $Works1Page = Page::create([
            'gallery_id' => $GalleryOurWorks->id,
            'title' => 'Work1',
            'slug' => 'work1',
            'description' => 'description',
            'keywords' => null,
            'main_page' => false,
            'text' => null,
            'banner_bottom_id'=> $BannerBottomWhyWhy->id,
            'work_id' => $Works1->id,
            'video_category_id' => $VideoCategory2->id
        ]);


        $Works2Page = Page::create([
            'gallery_id' => $GalleryOurWorks->id,
            'title' => 'Work2',
            'slug' => 'work2',
            'description' => 'description',
            'keywords' => null,
            'main_page' => false,
            'text' => null,
            'banner_bottom_id' => $BannerBottomMain->id,
            'work_id' => $Works2->id,
            'video_category_id' => $VideoCategory1->id
        ]);

        $Works3Page = Page::create([
            'gallery_id' => $GalleryOurWorks->id,
            'title' => 'Work3',
            'slug' => 'work3',
            'description' => 'description',
            'keywords' => null,
            'main_page' => false,
            'text' => null,
            'banner_bottom_id' => $BannerBottomWhyWhy->id,
            'work_id' => $Works3->id,
            'video_category_id' => $VideoCategory1->id
        ]);

        $Works4Page = Page::create([
            'gallery_id' => $GalleryWhyHow->id,
            'title' => 'Work4',
            'slug' => 'work4',
            'description' => 'description',
            'keywords' => null,
            'main_page' => false,
            'text' => null,
            'banner_bottom_id' => $BannerBottomMain->id,
            'work_id' => $Works4->id,
            'video_category_id' => $VideoCategory2->id
        ]);

        /**
         * Link
         */

        $link5 = link::create([
            'title' => 'Page5',
            'url' => null,
            'page_id' => 1
        ]);

        $link6 = link::create([
            'title' => 'Page6',
            'url' => null,
            'page_id' => 6
        ]);

        $link7 = link::create([
            'title' => 'Page7',
            'url' => null,
            'page_id' => 7
        ]);

        $link8 = link::create([
            'title' => 'Page5',
            'url' => null,
            'page_id' => 5
        ]);

        /**
         * SlideGallery
         */

        ImgGallery::create([
            'gallery_id' => $GalleryMain->id,
            'title' => "You are just moments away from top talent who will exceed your software goals",
            'description' => 'You are just moments away from top talent who will exceed your software goals',
            'alt' => 'img',
            'public' => 1,
            'position' => 0,
        ]);

        ImgGallery::create([
            'gallery_id' => $GalleryMain->id,
            'title' => "You are just moments away from top talent who will exceed your software goals",
            'description' => 'You are just moments away from top talent who will exceed your software goals',
            'alt' => 'img',
            'public' => 1,
            'position' => 1,
        ]);

        ImgGallery::create([
            'gallery_id' => $GalleryMain->id,
            'title' => "You are just moments away from top talent who will exceed your software goals",
            'description' => 'You are just moments away from top talent who will exceed your software goals',
            'alt' => 'img',
            'public' => 1,
            'position'=> 2,
        ]);

        ImgGallery::create([
            'gallery_id' => $GalleryWhyWhy->id,
            'title' => 'Why Use Dzensoft?',
            'description' => 'We know that finding talented and efficient specialists to fit your needs and budget is no picnic. When you hire us you can say goodbye to complications such as finding qualified talent and team dynamics. Here at Dzensoft, we take care of everything for you.',
            'alt' => 'img',
            'public' => 1,
            'position' => 3,
        ]);

        ImgGallery::create([
            'gallery_id' => $GalleryWhyWhat->id,
            'title' => 'What you get?',
            'description' => 'When you work with us you get superb remote IT specialists who seamlessly integrate into your team like your best in-house employee.',
            'alt' => 'img',
            'public' => 1,
            'position' => 4,
        ]);

        ImgGallery::create([
            'gallery_id' => $GalleryWhyHow->id,
            'title' => 'How do we work?',
            'description' => 'We save you a lot of headaches by connecting you with top talent, cutting out the middleman and eliminating exorbitant project fees.',
            'alt' => 'img',
            'public' => 1,
            'position' => 5,
        ]);

        ImgGallery::create([
            'gallery_id' => $GalleryClients->id,
            'title' => 'Clients',
            'description' => 'Dzensoft has been a source of top-notch talent for some dynamic businesses in Silicon Valley, New York City, Canada, Germany, China and beyond. Our experience working with exciting companies attracts remarkable talents to join this tech-savvy environment.',
            'alt' => 'img',
            'public' => 1,
            'position' => 6,
        ]);

        ImgGallery::create([
            'gallery_id' => $GalleryOurWorks->id,
            'title' => 'Our works',
            'description' => null,
            'alt' => 'img',
            'public' => 1,
            'position' => 7,
        ]);

        ImgGallery::create([
            'gallery_id' => $GalleryTopToo->id,
            'title' => 'Why we hire only top 2%?',
            'description' => 'At Dzensoft, we only want the best of the best: specialists who love what they do and do it well. To help us find the perfect fit, job candidates undergo a multi-step screening process which leaves no rock unturned.',
            'alt' => 'img',
            'public' => 1,
            'position' => 8,
        ]);

        ImgGallery::create([
            'gallery_id' => $CareerGallery->id,
            'title' => 'Learn. Play. Create remarkable things.',
            'description' => null,
            'alt' => 'img',
            'public' => 1,
            'position' => 9
        ]);

        ImgGallery::create([
            'gallery_id' => $GallerySlide1->id,
            'title' => "You are just moments away from top talent who will exceed your software goals",
            'description' => 'You are just moments away from top talent who will exceed your software goals',
            'alt' => 'img',
            'public' => 1,
            'position' => 0,
        ]);

        ImgGallery::create([
            'gallery_id' => $GallerySlide1->id,
            'title' => "You are just moments away from top talent who will exceed your software goals",
            'description' => 'You are just moments away from top talent who will exceed your software goals',
            'alt' => 'img',
            'public' => 1,
            'position' => 1,
        ]);

        ImgGallery::create([
            'gallery_id' => $GallerySlide1->id,
            'title' => "You are just moments away from top talent who will exceed your software goals",
            'description' => 'You are just moments away from top talent who will exceed your software goals',
            'alt' => 'img',
            'public' => 1,
            'position' => 2,
        ]);

        ImgGallery::create([
            'gallery_id' => $GallerySlide1->id,
            'title' => "You are just moments away from top talent who will exceed your software goals",
            'description' => 'You are just moments away from top talent who will exceed your software goals',
            'alt' => 'img',
            'public' => 1,
            'position' => 0,
        ]);

        /**
         * Static menu
         */

        MainMenu::create([
            'title' => 'Top2',
            'position' => 0,
            'page_id' => $PageTopToo->id
        ]);

        MainMenu::create([
            'title' => 'Why',
            'position' => 1,
             'page_id' => $PageWhy->id
        ]);

        MainMenu::create([
            'title' => 'Our Works',
            'position' => 3,
            'page_id' => $PageOurWorks->id
        ]);

        MainMenu::create([
            'title' => 'Clients',
            'position' => 4,
            'page_id' => $PageClients->id
        ]);

        MainMenu::create([
            'title' => 'Career',
            'position' => 5,
            'page_id' => $PageCareer->id
        ]);

        /**
         * link
         */

        $link1 = link::create([
            'title' => 'apply for a job',
            'url' => 'https://www.tut.by/'
        ]);

        $link2 = link::create([
            'title' => 'FAST FACTS SHEET',
            'url' => 'https://habrahabr.ru/'
        ]);

        $link3 = link::create([
            'title' => 'HIRE YOUR DREAM TEAM',
            'url' => 'https://habrahabr.ru/'
        ]);

        $link4 = link::create([
            'title' => 'GET STARTED NOW',
            'url' => 'https://habrahabr.ru/'
        ]);

        $social_github_link = link::create([
            'title' => 'social_github',
            'url' => 'https://github.com'
        ]);

        $social_behance_link = link::create([
            'title' => 'behance_link',
            'url' => 'https://www.behance.net'
        ]);

        $social_dribbble_link = link::create([
            'title' => 'behance_link',
            'url' => 'https://dribbble.com'
        ]);

        $social_facebook_link = link::create([
            'title' => 'facebook_link',
            'url' => 'https://www.facebook.com'
        ]);

        $social_twitter_link = link::create([
            'title' => 'twitter_link',
            'url' => 'https://twitter.com'
        ]);

        $social_linkedin_link = link::create([
            'title' => 'linkedin_link',
            'url' => 'https://www.linkedin.com'
        ]);

        $contact_us_link = link::create([
            'title' => 'Contact us',
            'page_id' => 2
        ]);

        /**
         * KeyConfig
         */

        $social_github = KeyConfig::create([
            'title' => 'social-github',
        ]);

        $social_behance = KeyConfig::create([
            'title' => 'social-behance',
        ]);
        $social_dribbble = KeyConfig::create([
            'title' => 'social-dribbble',
        ]);

        $social_facebook = KeyConfig::create([
            'title' => 'social-facebook',
        ]);
        $social_twitter = KeyConfig::create([
            'title' => 'social-twitter',
        ]);
        $social_linkedin = KeyConfig::create([
            'title' => 'social-linkedin',
        ]);

        $contact_us_key = KeyConfig::create([
            'title' => 'contact_us_link',
        ]);

        $mail = KeyConfig::create([
            'title' => 'mail',
        ]);

        $phone = KeyConfig::create([
            'title' => 'phone',
        ]);

        $phone2 = KeyConfig::create([
            'title' => 'phone2',
        ]);

        $address = KeyConfig::create([
            'title' => 'address',
        ]);

        /**
         * Create Config Page
         */

        Config::create([
            'title' => 'social_github',
            'key_config_id' => $social_github->id,
            'link_id' => $social_github_link->id
        ]);

        Config::create([
            'title' => 'social_behance',
            'key_config_id' => $social_behance->id,
            'link_id' => $social_behance_link->id
        ]);

        Config::create([
            'title' => 'social_dribbble',
            'key_config_id' => $social_dribbble->id,
            'link_id' => $social_dribbble_link->id
        ]);
        Config::create([
            'title' => 'social_facebook',
            'key_config_id' => $social_facebook->id,
            'link_id' => $social_facebook_link->id
        ]);

        Config::create([
            'title' => 'social_twitter',
            'key_config_id' => $social_twitter->id,
            'link_id' => $social_twitter_link->id
        ]);
        Config::create([
            'title' => 'social_linkedin',
            'key_config_id' => $social_linkedin->id,
            'link_id' => $social_linkedin_link->id
        ]);

        Config::create([
            'title' => 'Contact us',
            'key_config_id' => $contact_us_key->id,
            'link_id' => $contact_us_link->id
        ]);

        Config::create([
            'title' => 'mail@dzensoft.com',
            'key_config_id' => $mail->id,
            'link_id' => null
        ]);

        Config::create([
            'title' => '+375 29 677-22-44',
            'key_config_id' => $phone->id,
            'link_id' => null
        ]);

        Config::create([
            'title' => '+375 29 677-22-44',
            'key_config_id' => $phone2->id,
            'link_id' => null
        ]);

        Config::create([
            'title' => '14 Skryhanava st., Office 8, 220073, Minsk, Belarus',
            'key_config_id' => $address->id,
            'link_id' => null
        ]);

        /**
         * LinkCount
         */

        LinkCount::create([
            'img_gallery_id' => $GalleryMain->id,
            'link_id' => $link1->id
        ]);

        LinkCount::create([
            'img_gallery_id' => $GalleryMain->id,
            'link_id' => $link8->id
        ]);

        LinkCount::create([
            'img_gallery_id' => $GalleryWhyHow->id,
            'link_id' => $link3->id
        ]);

        LinkCount::create([
            'img_gallery_id' => $GalleryWhyWhat->id,
            'link_id' => $link4->id
        ]);

        LinkCount::create([
            'img_gallery_id' => $GalleryWhyWhat->id,
            'link_id' => $link5->id
        ]);

        LinkCount::create([
            'img_gallery_id' => $GalleryTopToo->id,
            'link_id' => $link5->id
        ]);

        LinkCount::create([
            'img_gallery_id' => $GalleryTopToo->id,
            'link_id' => $link8->id
        ]);

        LinkCount::create([
            'img_gallery_id' => $GalleryClients->id,
            'link_id' => $link6->id
        ]);

        LinkCount::create([
            'img_gallery_id' => $GalleryOurWorks->id,
            'link_id' => $link2->id
        ]);
        LinkCount::create([
            'img_gallery_id' => $GalleryOurWorks->id,
            'link_id' => $link3->id
        ]);
    }
}





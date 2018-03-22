import "blueimp-file-upload";
import 'blueimp-file-upload/js/jquery.iframe-transport.js';
import 'jquery-knob';

var ul = $('#upload .uploaded-files');

$('#drop a').click(function (e) {
    e.preventDefault();
    $(this).parent().find('input').click();
});

function removeLoadingElement() {
    var file = $(this).data('file');
    if (!file.deleteUrl) {
        return false;
    }
    var jqxhr = $.ajax({
            method: file.deleteType,
            url: file.deleteUrl,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        .done(function (msg) {
            $("#uploaded" + file.fileID).remove();
        });
}

/*******UPLOAD BOX ****/
if ($('#fileupload').length) {
    $('#fileupload').fileupload({
        // This element will accept file drag/drop uploading
        dropZone: $('#drop'),
        // This function is called when a file is added to the queue;
        // either via the browse button, or via drag/drop:
        add: function (e, data) {
            var tpl = $('<li class="working"><input type="text" value="0" data-width="48" data-height="48"' +
                ' data-fgColor="#A4D4FF" data-readOnly="1" data-bgColor="#A4D4FF" /><p></p><span></span></li>');
            // Append the file name and file size
            tpl.find('p').text(data.files[0].name)
                .append('<i>' + formatFileSize(data.files[0].size) + '</i>');
            // Add the HTML to the UL element
            data.context = tpl.appendTo(ul);
            // Initialize the knob plugin
            tpl.find('input').knob();
            // Listen for clicks on the cancel icon
            tpl.find('span').click(function () {

                if (tpl.hasClass('working')) {
                    jqXHR.abort();
                }

                tpl.fadeOut(function () {
                    tpl.remove();
                });
            });
            // Automatically upload the file once it is added to the queue
            var jqXHR = data.submit();
        },
        done: function (e, data) {
            var file = data.result.files["0"],
                closeElement = data.context.find('span'),
                input = $("<input type=\"hidden\" id=\"" + "uploaded" + file.fileID + "\" name=\"uploadedfiles[]\" />");

            data.form.append(input.val(file.fileID));
            closeElement.data('file', file);
            closeElement.click(removeLoadingElement);
        },
        progress: function (e, data) {
            // Calculate the completion percentage of the upload
            var progress = parseInt(data.loaded / data.total * 100, 10);

            // Update the hidden input field and trigger a change
            // so that the jQuery knob plugin knows to update the dial
            data.context.find('input').val(progress).change();

            if (progress == 100) {
                data.context.removeClass('working');
            }
        },
        fail: function (e, data) {
            // Something has gone wrong!
            data.context.addClass('error');
        }
    });
}
// Prevent the default action when a file is dropped on the window
$(document).on('drop dragover', function (e) {
    e.preventDefault();
});
// Helper function that formats the file sizes
function formatFileSize(bytes) {
    if (typeof bytes !== 'number') {
        return '';
    }
    if (bytes >= 1000000000) {
        return (bytes / 1000000000).toFixed(2) + ' GB';
    }
    if (bytes >= 1000000) {
        return (bytes / 1000000).toFixed(2) + ' MB';
    }
    return (bytes / 1000).toFixed(2) + ' KB';
}


// Slava shit
// $(document).on("submit", "#upload", function (n) {
//     var t = $("#register-first-name").val()
//         , o = $("#register-last-name").val()
//         , i = $("#register-email").val();
//     if ("" != t && "" != o && "" != i)
//         try {
//             a.length > 0 ? (n.preventDefault(),
//                 $("#upload").fileupload("send", {
//                     files: a
//                 }),
//                 e(1500),
//                 window.location = "ok-page") : console.log("plain default form submit")
//         } catch (n) {
//             console.log("error")
//         }
// });
// And Slava shit
Vue.component('element-cropimage', Vue.extend({
    props: {
        url: {
            required: true
        },
        value: {
            default: ''
        },
        readonly: {
            type: Boolean,
            default: false
        },
        name: {
            type: String,
            required: true
        },
        options: {
            type: Array,
            default: []
        },
    },
    data () {
        return {
            errors: [],
            uploading: false,
            val: '',
            popupCropImage: null,
            cropImage: null,
            opts: {
                cropOptions: {
                    viewMode: 1, // 0, 1, 2, 3
                    dragMode: 'crop', // 'crop', 'move' or 'none'
                    aspectRatio: 16 / 9, // Define the aspect ratio of the crop box
                    preview: '', // A selector for adding extra containers to preview
                    responsive: true, // Re-render the cropper when resize the window
                    restore: true, // Check if the current image is a cross-origin image
                    checkCrossOrigin: true, // Check if the current image is a cross-origin image
                    checkOrientation: true, // Check the current image's Exif Orientation information
                    modal: true, // Show the black modal
                    guides: true, // Show the dashed lines for guiding
                    center: true, // Show the center indicator for guiding
                    highlight: true, // Show the white modal to highlight the crop box
                    background: true, // Show the grid background
                    autoCrop: true, // Enable to crop the image automatically when initialize
                    autoCropArea: 0.80, // Define the percentage of automatic cropping area when initializes
                    movable: true, // Enable to move the image
                    rotatable: true, // Enable to rotate the image
                    scalable: true, // Enable to scale the image
                    zoomable: true, // Enable to zoom the image
                    zoomOnTouch: true, // Enable to zoom the image by dragging touch
                    zoomOnWheel: true, // Enable to zoom the image by wheeling mouse
                    wheelZoomRatio: 0.1, // Define zoom ratio when zoom the image by wheeling mouse
                    cropBoxMovable: true, // Enable to move the crop box
                    cropBoxResizable: true, // Enable to resize the crop box
                    toggleDragModeOnDblclick: true, // Toggle drag mode between "crop" and "move" when click twice on the cropper
                    // Size limitation
                    minCanvasWidth: 0,
                    minCanvasHeight: 0,
                    minCropBoxWidth: 0,
                    minCropBoxHeight: 0,
                    minContainerWidth: 200,
                    minContainerHeight: 100,
                    // Shortcuts of events
                    ready: function () {
                        $(this).cropper('crop');
                    },
                    cropstart: null,
                    cropmove: null,
                    cropend: null,
                    crop: null,
                    zoom: null
                },
                getCroppedCanvas: {
                    width: null,
                    height: null,
                    minWidth: 0,
                    minHeight: 0,
                    maxWidth: Infinity,
                    maxHeight: Infinity,
                    fillColor: 'transparent',
                    imageSmoothingEnabled: false,
                    imageSmoothingQuality: 'high'
                }
            }
        }
    },
    mounted () {
        this.val = this.value;
        this.opts = _.merge({}, this.opts, this.options);
        this.initUpload()
    },
    created: function () {
        window.addEventListener('keydown', this.keyDownActions);
    },
    beforeDestroy: function () {
        window.removeEventListener('keydown', this.keyDownActions);
    },
    methods: {
        keyDownActions (e) {
            if ((e.ctrlKey || e.metaKey) && (e.keyCode == 13 || e.keyCode == 10)) {
                if (this.popupCropImage && this.cropImage) {
                    let dropzone = $(this.$el.parentNode).find('.upload-button')
                    this.cropImage.cropper('getCroppedCanvas', this.opts.getCroppedCanvas).toBlob((blob) => {
                        blob.name = this.filename;
                        dropzone[0].dropzone.uploadFiles([blob]);
                        this.popupCropImage.close();
                    })
                }
            }
            if ((e.ctrlKey || e.metaKey) && e.keyCode == 70) {
                this.opts.cropOptions.aspectRatio = NaN;
                this.cropImage.cropper('setAspectRatio', NaN);
            }
        },
        initUpload () {
            let self = this,
                container = $(self.$el.parentNode),
                button = container.find('.upload-button');

            button.dropzone({
                url: this.url,
                method: 'POST',
                uploadMultiple: false,
                previewsContainer: false,
                acceptedFiles: 'image/*',
                dictDefaultMessage: '',
                sending () {
                    self.uploading = true;
                    self.closeAlert()
                },
                success (file, response) {
                    self.val = '';
                    self.val = response.value;
                },
                error (file, response) {
                    if(_.isArray(response.errors)) {
                        self.errors = response.errors;
                    }
                },
                complete(){
                    self.uploading = false;
                }
            });
        },
        remove () {
            let self = this;

            Admin.Messages.confirm(trans('lang.message.are_you_sure')).then(() => {
                self.val = '';
            });
        },
        closeAlert () {
            this.errors = [];
        },
        crop () {
            let self = this;
            self.popupCropImage = $.magnificPopup.instance;
            self.popupCropImage.open({
                items: {
                    src: self.image
                },
                type: 'image',
                callbacks: {
                    imageLoadComplete: function () {
                        let styles = {
                            'max-width': '90vw',
                            'max-height': '90vh'
                        };
                        this.currItem.img.css(styles);
                        this.contentContainer.css(styles);
                        self.cropImage = this.currItem.img
                        self.cropImage.cropper(self.opts.cropOptions);
                    },
                    close: function () {
                        self.cropImage.cropper('destroy');
                        self.cropImage = null;
                        self.popupCropImage = null;
                    }
                }
            }, 0);
        },
        randomString () {
            return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
        }
    },
    computed: {
        uploadClass() {
            if (!this.uploading) {
                return 'fa fa-upload';
            }
            return 'fa fa-spinner fa-spin'
        },
        has_value () {
            return this.val.length > 0
        },
        image () {
            return ((this.val.indexOf('http') === 0) ? this.val : Admin.Url.upload(this.val)) + '?' + this.randomString();
        },
        filename () {
            return this.val.replace(/^.*[\\\/]/, '');
        }
    }
}));
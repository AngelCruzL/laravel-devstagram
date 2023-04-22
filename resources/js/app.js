import { Dropzone } from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
  dictDefaultMessage: 'Arrastra la imagen aquí o haz click para subirla',
  acceptedFiles: '.jpg,.png,.jpeg,.gif',
  dictInvalidFileType: 'Solo se permiten imágenes con formato jpg, png, jpeg o gif',
  addRemoveLinks: true,
  dictRemoveFile: 'Eliminar Imagen',
  maxFiles: 1,
  uploadMultiple: false,

  init: function() {
    if (document.querySelector('input[name="image"]').value.trim()) {
      const publishedImage = {};
      publishedImage.size = 1234;
      publishedImage.name = document.querySelector('input[name="image"]').value;

      this.options.addedfile.call(this, publishedImage);
      this.options.thumbnail.call(this, publishedImage, `/uploads/${publishedImage.name}`);
      publishedImage.previewElement.classList.add('dz-success', 'dz-complete');
    }
  }
});

dropzone.on('success', function(file, response) {
  document.querySelector('input[name="image"]').value = response.image;
});

dropzone.on('removedfile', function() {
  document.querySelector('input[name="image"]').value = '';
});

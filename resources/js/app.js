import { Dropzone } from 'dropzone';

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone', {
  dictDefaultMessage: 'Arrastra la imagen aquí o haz click para subirla',
  acceptedFiles: '.jpg,.png,.jpeg,.gif',
  dictInvalidFileType: 'Solo se permiten imágenes con formato jpg, png, jpeg o gif',
  addRemoveLinks: true,
  dictRemoveFile: 'Eliminar Imagen',
  maxFiles: 1,
  uploadMultiple: false
});

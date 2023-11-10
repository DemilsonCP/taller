
//Guarda en una variables los botenes que se presiona
 const startButton = document.getElementById('Inicio');
 const stopButton = document.getElementById('Fin');
 const recordedVideo = document.getElementById('controles');

 //son variables utilizadas en el fragmento de código para la grabación y gestión de los fragmentos grabados durante el proceso de captura de pantalla y audio. 
 let mediaRecorder;
 let recordedChunks = [];

 // Función que se ejecuta al hacer clic en el botón "Inicio"
 async function iniciodegrabacion() {
     // Obtiene el flujo de medios (pantalla y audio)
     const stream = await navigator.mediaDevices.getDisplayMedia({ video: true, audio: true });

     // Crea un objeto MediaRecorder para la captura
     mediaRecorder = new MediaRecorder(stream);
     mediaRecorder.ondataavailable = event => {
         if (event.data.size > 0) {
             recordedChunks.push(event.data);
         }
     };

     // Cuando se detiene la grabación
     mediaRecorder.onstop = () => {
         // Crea un objeto Blob a partir de los fragmentos grabados
         const recordedBlob = new Blob(recordedChunks, { type: 'video/webm' });
         // Asigna la URL del Blob al elemento <video> para reproducirlo
         recordedVideo.src = URL.createObjectURL(recordedBlob);

         window.alert('¡Grabación finalizada!');
         window.alert("Puede descargar el video o recargar la pagina para iniciar otra grabacion");
     };

     // Inicia la grabación
     mediaRecorder.start();

     // Deshabilita el botón de inicio y habilita el de detener
     startButton.disabled = true;
     stopButton.disabled = false;
 }

 // Función que se ejecuta al hacer clic en el botón "Detener"
 function findegrabacion() {
     // Detiene la grabación
     mediaRecorder.stop();

     // Habilita el botón de inicio y deshabilita el de detener
     startButton.disabled = false;
     stopButton.disabled = true;
 }

 // Agrega los oyentes de eventos a los botones
 startButton.addEventListener('click', iniciodegrabacion);
 stopButton.addEventListener('click', findegrabacion);
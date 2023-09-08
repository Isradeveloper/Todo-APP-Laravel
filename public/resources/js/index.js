const formulario = document.querySelector('form')

formulario.addEventListener('submit', async function(event){

  event.preventDefault()
  
  const finalizacion = document.querySelector('#fecha_finalizacion').value
  const nombre = document.querySelector('#nombre').value
  
  if (finalizacion == '' || nombre == '') {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Por favor, verifica que los campos no estén vacios.',
      confirmButtonText: 'Aceptar',
    })
  } else {
    const respuesta = await Swal.fire({
      icon: 'warning',
      title: 'Espera...',
      text: '¿Estás seguro de que deseas agregar esta tarea?',
      confirmButtonText: 'Aceptar',
      denyButtonText: `Cancelar`,
      showDenyButton: true,
    })

    if (respuesta.isConfirmed) {
      formulario.submit()
    }
  }
})

const onEliminarTarea = async (index) => {
  try {

    const respuesta = await Swal.fire({
      icon: 'warning',
      title: 'Espera...',
      text: '¿Estás seguro de que deseas eliminar esta tarea?',
      confirmButtonText: 'Aceptar',
      denyButtonText: `Cancelar`,
      showDenyButton: true,
    })

    if (respuesta.isConfirmed) {
      const body = new FormData()
      body.append('index',index);
      body.append('_token', token)
  
      const peticion = await fetch(urlEliminar, {
        method: 'post',
        body: body
      });
  
      const respuestaJson = await peticion.json()
  
      if (!respuestaJson.success) {
        
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: respuestaJson.msg || "Ha ocurrido un error",
          confirmButtonText: 'Aceptar',
        })

      } else {
        
        const respuesta = await Swal.fire({
          icon: 'success',
          title: 'Genial!',
          text: 'La tarea ha sido eliminada.',
          confirmButtonText: 'Aceptar'
        })

        window.location.reload()

      }
    }

  } catch (error) {
    console.error(error);
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Ha ocurrido un error mientras se hacía la petición.',
      confirmButtonText: 'Aceptar',
    })
  }
}

const onCompletarTarea = async (index) => {
  try {

    const respuesta = await Swal.fire({
      icon: 'warning',
      title: 'Espera...',
      text: '¿Estás seguro de que deseas completar esta tarea?',
      confirmButtonText: 'Aceptar',
      denyButtonText: `Cancelar`,
      showDenyButton: true,
    })

    if (respuesta.isConfirmed) {
      const body = new FormData()
      body.append('index',index);
      body.append('_token', token)
  
      const peticion = await fetch(urlCompletar, {
        method: 'post',
        body: body
      });
  
      const respuestaJson = await peticion.json()
  
      if (!respuestaJson.success) {
        
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: respuestaJson.msg || "Ha ocurrido un error",
          confirmButtonText: 'Aceptar',
        })

      } else {
        
        const respuesta = await Swal.fire({
          icon: 'success',
          title: 'Genial!',
          text: 'La tarea ha sido completada.',
          confirmButtonText: 'Aceptar'
        })

        window.location.reload()

      }
    }

  } catch (error) {
    console.error(error);
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Ha ocurrido un error mientras se hacía la petición.',
      confirmButtonText: 'Aceptar',
    })
  }
}



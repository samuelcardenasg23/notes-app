import Swal from 'sweetalert2'
import axios from 'axios'

export function show_alert(message, icon, focus = '') {
  if (focus !== '') {
    document.getElementById(focus).focus()
  }
  Swal.fire({
    title: message,
    icon: icon,
    customClass: {
      confirmButton:
        'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800',
      popup: 'animated zoomIn'
    }
  })
}

export function confirm(id) {
  const url = 'http://127.0.0.1:8000/api/notes/' + id //cambiar a let
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      sendRequest('DELETE', { id: id }, url, 'Note deleted successfully!')
      // Swal.fire({
      //   title: 'Deleted!',
      //   text: 'Your file has been deleted.',
      //   icon: 'success'
      // })
    } else {
      show_alert('Canceled', 'info')
    }
  })
}

export function sendRequest(method, parameters, url, message) {
  axios({
    method: method,
    url: url,
    data: parameters
  })
    .then(function (response) {
      if (response.status === 204) {
        show_alert(message, 'success')
        window.setTimeout(function () {
          window.location.href = '/'
        }, 1000)
      } else {
        show_alert('Something went wrong...sorry', 'error')
      }
    })
    .catch(function (error) {
      show_alert('Something went wrong...sorry', 'error')
      console.error('There was an error!', error)
    })
}

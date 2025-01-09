"use strict";
// Para escuchar todos los registros de una api
fetch('https://jsonplaceholder.typicode.com/posts')
.then((response) => response.json())
.then((json) => console.log(json));

// Para escuchar un solo resgistro de una api
fetch('https://jsonplaceholder.typicode.com/posts/1')
.then((response) => response.json())
.then((json) => console.log(json));

// Crear un nuevo recurso en la API
fetch('https://jsonplaceholder.typicode.com/posts', {
    method: 'POST',
    body: JSON.stringify({
      title: 'foo',
      body: 'bar',
      userId: 1,
    }),
    headers: {
      'Content-type': 'application/json; charset=UTF-8',
    },
  })
    .then((response) => response.json())
    .then((json) => console.log(json));

// Actualizar un recurso de la API
fetch('https://jsonplaceholder.typicode.com/posts/1', {
    method: 'PUT',
    body: JSON.stringify({
      id: 1,
      title: 'foo',
      body: 'bar',
      userId: 1,
    }),
    headers: {
      'Content-type': 'application/json; charset=UTF-8',
    },
  })
    .then((response) => response.json())
    .then((json) => console.log(json));

// Borrar un recurso de la API
fetch('https://jsonplaceholder.typicode.com/posts/1', {
    method: 'DELETE',
  });

// Filtrar recursos
fetch('https://jsonplaceholder.typicode.com/posts?userId=1')
  .then((response) => response.json())
  .then((json) => console.log(json));

// Escuchar recursos jerarquizados
fetch('https://jsonplaceholder.typicode.com/posts/1/comments')
.then((response) => response.json())
.then((json) => console.log(json));
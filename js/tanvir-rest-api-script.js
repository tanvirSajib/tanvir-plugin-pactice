fetch(tanvirApi.restUrl, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({ name: 'John Doe' }),
})
.then(response => response.json())
.then(data => console.log(data));
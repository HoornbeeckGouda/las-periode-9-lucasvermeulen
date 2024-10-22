
document.getElementById('careerSelect').addEventListener('change', function() {
    var careerId = this.value;
    if (careerId != 0) {
        fetch(`/student-career/${careerId}`, {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        })
        .then(response => response.json())
        .then(data => {
            updateCareerData(data);
        })
        .catch(error => console.error('Error:', error));
    }
});

function updateCareerData(data) {
    // Update the table or any other DOM element with the new data
    let table = document.querySelector('#careerTable tbody');
    table.innerHTML = ''; // Clear previous data

    data.forEach(career => {
        let row = `<tr>
                      <td>${career.id}</td>
                      <td>${career.course.name}</td>
                      <td>${career.group.name}</td>
                      <td>${career.schoolYear.year}</td>
                  </tr>`;
        table.innerHTML += row;
    });
}

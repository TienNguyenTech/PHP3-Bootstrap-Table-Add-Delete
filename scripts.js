$(document).ready(() => {
    $('.student-delete').on('click', (e) => {
        let student = $(e.target).parents('tr');
        let student_fullname = student.find('td.student-firstname').text() + " " + student.find('td.student-surname').text()
        if (!confirm('Are you sure to delete the student "' + student_fullname + '"?')) e.preventDefault();
    });
});
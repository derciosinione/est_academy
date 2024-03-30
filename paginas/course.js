let modalAddCourse = document.getElementById("modalAddCourse");

function toggleModalAddCourse() {
    if (modalAddCourseIsVisible()) hideModalAddCourse();
    else showModalAddCourse();
}

function modalAddCourseIsVisible() {
    return modalAddCourse.style.display === "block";
}

function hideModalAddCourse() {
    modalAddCourse.style.display = "none";
}

function showModalAddCourse() {
    modalAddCourse.style.display = "block";
}
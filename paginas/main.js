let moreOption = document.getElementById("more-option");

function toggleMoreOption() {
    if (moreOptionIsVisible()) hideMoreOption();
    else showMoreOption();
}

function moreOptionIsVisible() {
    return moreOption.style.display === "block";
}

function hideMoreOption() {
    moreOption.style.display = "none";
}

function showMoreOption() {
    moreOption.style.display = "block";
}

function hideMessageBox(){
    let element = document.getElementById("message-box");
    element.style.display = "none";
}
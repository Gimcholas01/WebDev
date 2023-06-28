function autoExpand(e){
    e.style.height = '2 rem';
    e.style.height = (e.scrollHeight) + "px";
}
const toggleDetail = document.getElementById("toggleDetail");
const toggleStudentList = document.getElementById("toggleStudentList");
const hiddenStudentList = document.getElementById("hiddenStudentList");
const hiddenAnnouncement = document.getElementById("hiddenAnnouncement");
const courseDetail = document.getElementById("hiddenDetail");
const newAnnouncementInput = document.getElementById("newAnnouncementInput");
const hiddenAttributeNewAnnouncement = document.querySelectorAll(".hiddenAttributeNewAnnouncement");
const cancelAnnouncementButton = document.getElementById("cancelAnnouncement");
// const newannouncementContainer = document.getElementById("new-announcement-container");
const newAnnouncementForm = document.getElementById("newAnnouncementForm");
const toggleUpdateSection = document.getElementById("toggleUpdateSection");
const hiddenUpdateSection = document.getElementById("hiddenUpdateSection");

toggleDetail.addEventListener("click", function(e) {
    if(courseDetail.style.display == "none"){
        courseDetail.style.display = "block";
        toggleDetail.innerHTML = "Hide Description";
    }
    else {
        courseDetail.style.display = "none";
        toggleDetail.innerHTML = "Course Description";
    }
})

toggleStudentList.addEventListener("click", function(e) {
    if(hiddenStudentList.style.display == "none"){
        hiddenStudentList.style.display = "block";
        hiddenAnnouncement.style.display = "none";
        toggleDetail.style.display = "none";
        toggleUpdateSection.style.display = "none";
        toggleStudentList.innerHTML = "Announcement";
    }
    else {
        hiddenStudentList.style.display = "none";
        hiddenAnnouncement.style.display = "block";
        toggleDetail.style.display = "block";
        toggleUpdateSection.style.display = "block";
        toggleStudentList.innerHTML = "Student List";
    }
})

toggleUpdateSection.addEventListener("click", function(e) {
    if(hiddenUpdateSection.style.display == "none"){
        hiddenUpdateSection.style.display = "block";
        hiddenAnnouncement.style.display = "none";
        toggleDetail.style.display = "none";
        toggleStudentList.style.display = "none";
        toggleUpdateSection.innerHTML = "Announcement";
    }
    else {
        hiddenUpdateSection.style.display = "none";
        hiddenAnnouncement.style.display = "block";
        toggleDetail.style.display = "block";
        toggleStudentList.style.display = "block";
        toggleUpdateSection.innerHTML = "Update Section";
    }
})

cancelAnnouncementButton.addEventListener("click", function(e) {
    Array.from(hiddenAttributeNewAnnouncement).forEach(function(f) {
        newAnnouncementForm.reset();
        f.style.display = "none";
    });
});

newAnnouncementInput.addEventListener("click", function(e) {
    Array.from(hiddenAttributeNewAnnouncement).forEach(function(f) {
        if (f.style.display === "none") {
            f.style.display = "block";
        } 
        // else {
        //     f.style.display = "none";
        // }
    });
});

if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
const Toast = Swal.mixin({
    toast: true,
    position: 'center',
    showConfirmButton: false,
    padding:40,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
const radios = document.querySelectorAll('input[type="radio"]');
for (const radio of radios) {
    radio.addEventListener("click", () => {
        console.log(`${radio.value} is selected`);
        nextPrev(1);
    });
}

document.addEventListener('keyup',(event) =>{
    if(event.key === "ArrowLeft") {
        nextPrev(1);
    }


})
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab
function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "پایان";
    } else {
        document.getElementById("nextBtn").innerHTML = "بعدی";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return true;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}
function validateForm() {
    // This function deals with validation of the form fields
    var x,r, y, i,z, valid = true;
    x = document.getElementsByClassName("tab");
    r =  document.getElementById("number");
    y = x[currentTab].getElementsByTagName("input") ;
    z = x[currentTab].getElementsByTagName("textarea") ;
     
    if (r.value.length > 0){

        if(isNaN(r.value)|| r.value.length < 11 || r.value.length > 11){
            Toast.fire({
                icon: 'error',
                title: 'لطفا یک شماره تلفن معتبر وارد کنید '
            })
            valid = false;
        }
    }
    if(z.length === 1){
          // alert(document.getElementById("editor").value.length)
        if (document.getElementById("editor").value.length <= 3) {
            Toast.fire({
                icon: 'error',
                title: 'لطفا فیلد ها را با دقت پرکنید'
            })
            valid = false;
    }
    }
    

    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            Toast.fire({
                icon: 'error',
                title: 'لطفا فیلد ها را با دقت پرکنید'
            })


            // and set the current valid status to false
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";




}
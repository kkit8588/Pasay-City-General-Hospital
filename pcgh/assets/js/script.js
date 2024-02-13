/* ================================================
    SIDE BAR AND RESPONSIVE WHEN TOGGLE MENU BAR
   ================================================ */

const menuIcon = document.getElementById("menuIcon");
const sidebar = document.querySelector(".sidebar");
const hmsBody = document.querySelector(".hmsBody");

menuIcon.addEventListener('click', () => {
	if (menuIcon.classList.contains('fa-bars')) {
		sidebar.classList.toggle('toggle')
   		hmsBody.classList.toggle('toggle')
	}
 
});

let initialWidth = window.innerWidth;
let initialHeight = window.innerHeight;

        // Add an event listener for the "resize" event
        window.addEventListener('resize', function () {
            // Check if the window size has significantly changed (e.g., width change by at least 10 pixels)
            if (Math.abs(window.innerWidth - initialWidth) >= 10 || Math.abs(window.innerHeight - initialHeight) >= 10) {
                // Reload the page when the window is resized significantly
                window.location.reload();
            }
        });

const formBtn = document.getElementById("formBtn");
const formIcon = document.querySelector(".formIcon");
formBtn.addEventListener('click', () => {

        formIcon.classList.toggle('fa-chevron-left')
        formIcon.classList.toggle('fa-chevron-down')
 
});

/* ================================================
    Phone number length 11 format in XXXX-XXX-XXX
   ================================================ */
const gcontactno = document.getElementById('gcontactno');

        gcontactno.addEventListener('input', function () {
            // Get the current input value and remove non-numeric characters
            let gcontactnoValue = this.value.replace(/\D/g, '');

            // Format the input value with dashes
            let gcontactnoformatVal = '';
            for (let i = 0; i < gcontactnoValue.length; i++) {
                if (i === 4 || i === 7) {
                    gcontactnoformatVal += ' -' + gcontactnoValue[i];
                } else {
                    gcontactnoformatVal += gcontactnoValue[i];
                }
            }

            // Update the input value with the formatted number
            this.value = gcontactnoformatVal;
        });
const contactno = document.getElementById('contactno');

        contactno.addEventListener('input', function () {
            // Get the current input value and remove non-numeric characters
            let contactnoValue = this.value.replace(/\D/g, '');

            // Format the input value with dashes
            let contactnoformatVal = '';
            for (let i = 0; i < contactnoValue.length; i++) {
                if (i === 4 || i === 7) {
                    contactnoformatVal += ' -' + contactnoValue[i];
                } else {
                    contactnoformatVal += contactnoValue[i];
                }
            }

            // Update the input value with the formatted number
            this.value = contactnoformatVal;
        });


/* ================================================
 SELECT ON CURRENT DROPDOWN WILL SHOW ANOTHER DROPDOWN
   ================================================ */
document.getElementById('city').addEventListener('change', function () {
            var bgryContainer = document.getElementById('bgryContainer');
            var barangay = document.getElementById('barangay');
            var othersContainer = document.getElementById('othersContainer');

            // Show the second dropdown if a specific option is selected in the first dropdown
            if (this.value === 'Pasig') {
                bgryContainer.style.display = 'block';
                // You can also set default options for the second dropdown here if needed
            } else {
                bgryContainer.style.display = 'none';
                // Reset the second dropdown to its initial state or hide it
                barangay.selectedIndex = 0;
            }
            if (this.value === 'Others') {
                othersContainer.style.display = 'block';
                // You can also set default options for the second dropdown here if needed
            } else {
                othersContainer.style.display = 'none';
                // Reset the second dropdown to its initial state or hide it
            }
        });
document.getElementById('servicetype').addEventListener('change', function () {
            var obstetricsContainer = document.getElementById('obstetricsContainer');
            var obstetrics = document.getElementById('obstetrics');

            // Show the second dropdown if a specific option is selected in the first dropdown
            if (this.value === 'Obstetrics') {
                obstetricsContainer.style.display = 'block';
                // You can also set default options for the second dropdown here if needed
            } else {
                obstetricsContainer.style.display = 'none';
                // Reset the second dropdown to its initial state or hide it
                obstetrics.selectedIndex = 0;
            }
        });

document.getElementById('wcpu').addEventListener('change', function () {
            var tocaContainer = document.getElementById('tocaContainer');
            var typeofcaseabuse = document.getElementById('typeofcaseabuse');

            // Show the second dropdown if a specific option is selected in the first dropdown
            if (this.value === 'Yes') {
                tocaContainer.style.display = 'block';
                // You can also set default options for the second dropdown here if needed
            } else {
                tocaContainer.style.display = 'none';
                // Reset the second dropdown to its initial state or hide it
                typeofcaseabuse.selectedIndex = 0;
            }
        });


/* ================================================
    TABLE DESIGN AND SEARCH START
   ================================================ */
new DataTable('#listID');
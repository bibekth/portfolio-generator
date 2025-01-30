// $(document).ready(function () {
//     // Initialize Sortable.js
//     new Sortable(document.getElementById("portfolio-sections"), {
//         animation: 150,
//         handle: ".section-item",
//     });

//     // Add a new section on button click
//     $("#add-new-section-button").click(function () {
//         let sectionID = Date.now(); // Unique ID for each section

//         let newSection = `
//             <div class="section-item" id="section-${sectionID}">
//                 <button class="btn btn-danger btn-sm remove-section">X</button>
//                 <p>Empty Section (Drag & Resize)</p>
//             </div>
//         `;

//         $("#portfolio-sections").append(newSection);

//         // Make the newly added section resizable
//         $(`#section-${sectionID}`).resizable({
//             handles: "n,s",
//         });
//     });

//     // Remove section on button click
//     $(document).on("click", ".remove-section", function () {
//         $(this).closest(".section-item").remove();
//     });
// });

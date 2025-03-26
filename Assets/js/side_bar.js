
    // File:           Side bar JavaScript
    // Purpose:        This fie handle the Side Bar buttons initially the Sub-buutons/Sub-menu of each Main side bar button are hide , they just appear when the user click on main button
// Created By :						Muhammad Fahad c00311349    
//Group Members :
//									c00298483 Adam Dowling
//									C00295140 Taemour Basharat
//									C00311349 Muhammad Fahad
//									C00297032 Emoshoke Saliu
//									C00290944 Gleb Tutubalin  
    // Date:           25/03/2025

    document.addEventListener("DOMContentLoaded", () => {
        //Select all main menu items
        let main_menus = document.querySelectorAll(".main_menu");
    
        main_menus.forEach(menu => {
            menu.addEventListener("click", (e) => {
                e.preventDefault(); // Stop default link behavior
    
                //Get the submenu next to the clicked menu
                let sub_menu = menu.nextElementSibling;
    
                //check if the submenu exists (some menus don’t have submenus)
                if (sub_menu && sub_menu.classList.contains("submenu")) {
                    let isOpen = sub_menu.classList.contains("show");
    
                    //Close all other submenus
                    document.querySelectorAll(".submenu").forEach(sub => sub.classList.remove("show"));
    
                    // oggle the clicked submenu (show if it was hidden, hide if it was open)
                    if (!isOpen) {
                        sub_menu.classList.add("show");
                    }
                }
            });
        });
    });
    
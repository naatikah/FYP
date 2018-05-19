var created = 0;
function displayAccordingly() {
    if (created == 1) {
            removeDrop();
        }

                //Call mainMenu the main dropdown menu
                var mainMenu = document.getElementById('mainMenu');
    
                //Create the new dropdown menu
                var whereToPut = document.getElementById('StationName');
                var newDropdown = document.createElement('select');
                newDropdown.className="form-control";
                newDropdown.setAttribute('id',"newDropdownMenu");
                whereToPut.appendChild(newDropdown);

                if (mainMenu.value == "north") { //The person chose fruit
    
                    //Add an option called "Apple"
                    var optionWDL=document.createElement("option");
                    optionWDL.text="Woodlands";
                    newDropdown.add(optionWDL,newDropdown.options[null]);
    
                    //Add an option called "Banana"
                    var optionYSN=document.createElement("option");
                    optionYSN.text="Yishun";
                    newDropdown.add(optionYSN,newDropdown.options[null]);
    
                } else if (mainMenu.value == "south") { //The person chose vegetabes
    
                    //Add an option called "Spinach"
                    var optionCNT=document.createElement("option");
                    optionCNT.text="Chinatown";
                    newDropdown.add(optionCNT,newDropdown.options[null]);
    
                    //Add an option called "Zucchini"
                    var optionHBF=document.createElement("option");
                    optionHBF.text="Harbourfront";
                    newDropdown.add(optionHBF,newDropdown.options[null]);
    
                }
                else if (mainMenu.value == "east") { //The person chose vegetabes
    
                    //Add an option called "Spinach"
                    var optionCGI=document.createElement("option");
                    optionCGI.text="Changi";
                    newDropdown.add(optionCGI,newDropdown.options[null]);
    
                    //Add an option called "Zucchini"
                    var optionPSR=document.createElement("option");
                    optionPSR.text="Pasir Ris";
                    newDropdown.add(optionPSR,newDropdown.options[null]);
    
                }
                else if (mainMenu.value == "west") { //The person chose vegetabes
    
                    //Add an option called "Spinach"
                    var optionJRE=document.createElement("option");
                    optionJRE.text="Jurong East";
                    newDropdown.add(optionJRE,newDropdown.options[null]);
    
                    //Add an option called "Zucchini"
                    var optionCLE=document.createElement("option");
                    optionCLE.text="Clementi";
                    newDropdown.add(optionCLE,newDropdown.options[null]);
    
                }
                else if (mainMenu.value == "central") { //The person chose vegetabes
    
                    //Add an option called "Spinach"
                    var optionSRG=document.createElement("option");
                    optionSRG.text="Serangoon";
                    newDropdown.add(optionSRG,newDropdown.options[null]);
    
                    //Add an option called "Zucchini"
                    var optionKVN=document.createElement("option");
                    optionKVN.text="Kovan";
                    newDropdown.add(optionKVN,newDropdown.options[null]);
    
                }
                created = 1
            }

            function removeDrop() {
        var d = document.getElementById('StationName');

        var oldmenu = document.getElementById('newDropdownMenu');

        d.removeChild(oldmenu);
    }
function addNewSField() {
   
    let newNode = document.createElement("textarea");
    newNode.classList.add("form-control");
    newNode.classList.add("sField");
    newNode.classList.add("mt-2");
    newNode.setAttribute("rows", 1);
    newNode.setAttribute("placeholder","Enter here")

    let sOb = document.getElementById("s")
    let sAddButtonOb = document.getElementById("sAddButton");

    sOb.insertBefore(newNode, sAddButtonOb);
}

function addNewAQField() {
    let newNode = document.createElement("textarea");
    newNode.classList.add("form-control");
    newNode.classList.add("aqField");
    newNode.classList.add("mt-2");
    newNode.setAttribute("rows", 3);
    newNode.setAttribute("placeholder","Enter here")
 
    let aqOb = document.getElementById("aq")
    let aqAddButtonOb = document.getElementById("aqAddButton");
 
    aqOb.insertBefore(newNode, aqAddButtonOb);
}

function addNewLField(){
    let newNode = document.createElement("textarea");
    newNode.classList.add("form-control");
    newNode.classList.add("lField");
    newNode.classList.add("mt-2");
    newNode.setAttribute("rows", 1);
    newNode.setAttribute("placeholder","Enter here")
 
    let lOb = document.getElementById("l")
    let lAddButtonOb = document.getElementById("lAddButton");
 
    lOb.insertBefore(newNode, lAddButtonOb);
}

function generateCV() {

    let nameField=document.getElementById("nameField").value;
    let nameT1=document.getElementById("nameT1");
    nameT1.innerHTML=nameField;

    document.getElementById("nameT2").innerHTML=nameField;
    document.getElementById("contactT").innerHTML=document.getElementById("contactField").value;
    document.getElementById("addressT").innerHTML=document.getElementById("addressField").value;
    document.getElementById("gT").innerHTML=document.getElementById("gField").value;
    document.getElementById("fbT").innerHTML=document.getElementById("fbField").value;
    document.getElementById("linkedT").innerHTML=document.getElementById("linkedField").value;

    document.getElementById("eT").innerHTML=document.getElementById("eField").value;

    //skills

    let ss=document.getElementsByClassName("sField");

    let str='';

    for(let e of ss)
    {
        str=str+ `<li> ${e.value} </li>`;      
    }
    document.getElementById("sT").innerHTML=str;

    //Academic Q

    let aqs=document.getElementsByClassName("aqField");

    let str1='';

    for(let e of aqs)
    {
        str1+=`<li> ${e.value} </li>`;      
    }
    document.getElementById("aqT").innerHTML=str1;

    //Languages

    //let ls=document.getElementsByClassName("lField");

    //let str2='';

    //for(let e of ls)
    //{
     //   str2=str2+ `<li> ${e.value} </li>`;      
    //}
   // document.getElementById("lT").innerHTML=str2;

    document.getElementById("cv-form").style.display="none";
    document.getElementById("cv-template").style.display="block";

}

function printCV() {
    
    window.print();

}
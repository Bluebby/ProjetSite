var counter=1;
        setInterval(function(){
            document.getElementById('radio' + counter).checked=true;
            counter++;
            if(counter > 4){
                counter = 1;
            }
        },5000);

function openForm() {
    document.getElementById("popupForm").style.display = "block";
}
        
function closeForm() {
    document.getElementById("popupForm").style.display = "none";
}
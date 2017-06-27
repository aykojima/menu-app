function calcSashimi(){
    var sushiP = document.getElementById('sushiPrice').value;
    console.log(sushiP);
    var newSashimiP = 0;
    if(sushiP == ""){
            document.getElementById('sashimiPrice').value = null;
    }else if(isNaN(sushiP) === false){           
            newSashimiP = sushiP * 2;
            console.log(newSashimiP);
            document.getElementById('sashimiPrice').value = newSashimiP;
    }else{
            document.getElementById('sashimiPrice').value = 'Please enter number';
    }
}
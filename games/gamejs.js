var btns = document.querySelectorAll('button');
var score=document.getElementsByClassName("player");
var XO = 'x';
var win1=0;
var win2=0;
var NoOneWon=0;
var player=[];
var AI=[];
for(i = 0; i<btns.length; i++){
    btns[i].onclick = function(){
        if( ! this.classList.contains('unclickable')){
             player.push(this.attributes.id);
            this.textContent = XO;
        this.style.fontSize = '20px';
        this.classList.add('unclickable');
          NoOneWon++;
       if(XO==='x'){
           XO = 'o';
       }else{XO = 'x';}
             if(checkWinner(player)){alert('palyer 1 won'); init(); 
                win1++;
               score[0].firstElementChild.textContent = "player 1: "+win1;  
               }
            
            againstAi(); //error at the last click of the 1st playerX but doesn't matter :/
            NoOneWon++;
            if(NoOneWon==9){
                alert('no One Won :|');init();
            }
        }//onclick end
         
    }
}
    
    
    function againstAi(){
        var emptyList= new Array();
        for(i = 0; i<btns.length ; i++){
            
            if( ! btns[i].classList.contains('unclickable')){
                emptyList.push(btns[i]);
               
            }
        }
        /*for(i = 0; i<emptyList.length ; i++){
            console.log(emptyList[i]);
        }*/
        //random btn
        var random=Math.floor(Math.random() *emptyList.length);
        AI.push(emptyList[random].attributes.id);
        emptyList[random].textContent=XO
        emptyList[random].style.fontSize = '20px';
        emptyList[random].classList.add('unclickable');
        
       // console.log(random);
         if(XO==='x'){
           XO = 'o';
       }else{XO = 'x';}
        
        if(checkWinner(AI)){alert('player 2 won ');init(); 
               win2++;
               score[0].firstElementChild.textContent = "player 1: "+win2;                    
         }
    }//againstAi end
    
    function checkWinner(playerX){
         if((playerX.indexOf( btnId( 0 ) ) !=-1  &&  playerX.indexOf( btnId( 1 ) ) !=-1 &&  playerX.indexOf( btnId( 2 ) ) !=-1) ){
                 //console.log(playerX.indexOf( btnId( 5 ) ) !=-1)
                 return true;
                 } 
          else if((playerX.indexOf( btnId( 3 ) ) !=-1  &&  playerX.indexOf( btnId( 4 ) ) !=-1 &&  playerX.indexOf( btnId( 5 ) ) !=-1)){
                     return true;
                 }
        else if((playerX.indexOf( btnId( 6 ) ) !=-1  &&  playerX.indexOf( btnId( 7 ) ) !=-1 &&  playerX.indexOf( btnId( 8 ) ) !=-1)){
                     return true;
                 }
        else if((playerX.indexOf( btnId( 0 ) ) !=-1  &&  playerX.indexOf( btnId( 3 ) ) !=-1 &&  playerX.indexOf( btnId( 6 ) ) !=-1)){
                     return true;
                 }
        else if((playerX.indexOf( btnId( 1 ) ) !=-1  &&  playerX.indexOf( btnId( 4 ) ) !=-1 &&  playerX.indexOf( btnId( 7 ) ) !=-1)){
                     return true;
                 }
        else if((playerX.indexOf( btnId( 2 ) ) !=-1  &&  playerX.indexOf( btnId( 5 ) ) !=-1 &&  playerX.indexOf( btnId( 8 ) ) !=-1)){
                     return true;
                 }
        else if((playerX.indexOf( btnId( 0 ) ) !=-1  &&  playerX.indexOf( btnId( 4 ) ) !=-1 &&  playerX.indexOf( btnId( 8 ) ) !=-1)){
                     return true;
                 }
        else if((playerX.indexOf( btnId( 2 ) ) !=-1  &&  playerX.indexOf( btnId( 4 ) ) !=-1 &&  playerX.indexOf( btnId( 6 ) ) !=-1)){
                     return true;
                 }
        else{return false;}
        
    }
    
    function btnId(a){
        return btns[a].attributes.id;
    }

function init(){
    for(i = 0 ; i<9 ; i++){
        btns[i].style.fontSize='1px';
        btns[i].textContent="x" // just an initialisation :)
        if(btns[i].classList.contains('unclickable')){btns[i].classList.remove('unclickable');}
        player=[];
        AI=[];
        NoOneWon=0;
    }
}

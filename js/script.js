function newwindowlogin(){
    
    window.location.assign("https://music-site-konnushka.c9users.io/index.php");
  
    
}
function delay(){
    setTimeout(function(){
        newwindowlogin();
    }, 3100);
}

function getoption()
{
    var x = document.getElementById("1").selected;
    var xx = document.getElementById("2").selected;
    var w = document.getElementById("3").selected;
    var z = document.getElementById("4").selected;
    
    if (x == true)
    {var y = 1;
        document.getElementById("selectedoption").innerHTML = y;
    }
    if (xx == true)
    {var y = 2;
        document.getElementById("selectedoption").innerHTML = y;
    }
    if (w == true)
    {var y = 3;
        document.getElementById("selectedoption").innerHTML = y;
    }
    if (z == true)
    {var y = 4;
        document.getElementById("selectedoption").innerHTML = y;
    }
}

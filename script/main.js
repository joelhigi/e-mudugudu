function nextSelect(arr){
    document.querySelector('.main').classList.remove('hide');
    document.querySelector('.main').classList.add('disp');
    document.querySelector('.isibo').classList.remove('disp');
    document.querySelector('.ubwisungane').classList.remove('disp');
    document.querySelector('.isibo').classList.add('hideIsibo');
    document.querySelector('.ubwisungane').classList.add('hideIsibo');
    document.querySelector('.abashatse').classList.remove('disp');
    document.querySelector('.abashatse').classList.add('hideIsibo');

    // alert('umuturage');
    var s2 = document.getElementById('slct2');
    s2.innerHTML = " ";
    for( var opt in arr) {
        var pair = arr[opt].split('|');
        var newOption = document.createElement('option');
        // alert(opt);
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);
    }
}

function isiboBox(){
    var s2 = document.getElementById('slct2');
    document.querySelector('.isibo').classList.remove('disp');
    document.querySelector('.ubwisungane').classList.remove('disp');
    document.querySelector('.abashatse').classList.remove('disp');
    document.querySelector('.isibo').classList.add('hideIsibo');
    document.querySelector('.ubwisungane').classList.add('hideIsibo');
    document.querySelector('.abashatse').classList.add('hideIsibo');
    if( s2.value == 'isibo'){
        // alert('hello');
        document.querySelector('.isibo').classList.remove('hideIsibo');
        document.querySelector('.isibo').classList.add('disp');
    }else if( s2.value == 'ubwisungane'){
        // alert('hello');
        document.querySelector('.ubwisungane').classList.remove('hideIsibo');
        document.querySelector('.ubwisungane').classList.add('disp');
    }else if( s2.value == 'abashatse'){
        // alert('hello');
        document.querySelector('.abashatse').classList.remove('hideIsibo');
        document.querySelector('.abashatse').classList.add('disp');
    }
}

function ubwisunganeBox(){}

function populate(){
    var s1 = document.getElementById('slct1');
    switch(s1.value){
        case 'abaturage':
            var optionArray = ["none|BOSE","umuganda|ABAGOMBA KWITABIRA UMUGANDA","ubwisungane|UBWISUNGANE",
                            "abanyamahanga|ABANYAMAHANGA","abadafiteIbyangombwa|ABADAFITE IBYANGOBWA",
                            "abamugaye|ABAFITE UBUMUGA","abafunzwe|ABAFUNZWE","ahobaba|AHO BURI MUTURAGE ABA"];
            nextSelect(optionArray);
            break;
        case 'abayobozi':
            var optionArray = ["umudugudu|UMUDUGUDU","mutwarasibo|BA MUTWARASIBO","CNF|CNF", "urubyiruko|CNJ","ubudehe|UBUDEHE","abajyanamaUbuzima|ABAJYANAMA B'UBUZIMA","umugoroba|UMUGOROBA W'UMURYANGO","inshutiUmuryango|INSHUTI Z'UMURYANGO"];
            nextSelect(optionArray);
            break;
        // case 'abana':
        //     var optionArray = ["none|BOSE","imirire|IMIRIRE", "imyigire|IMYIGIRE"];
        //     nextSelect(optionArray);
        //     break;
        // case 'abagore':
        //     var optionArray = ["none|BOSE", "abashatse|ABUBATSE", "ababyariyeIwabo|ABABYARIYE IWABO"];
        //     nextSelect(optionArray);
        //     break;
        // case 'urubyiruko':
        //     var optionArray = ["none|RWOSE","urwiga|URWIGA","urutiga|URUTIGA","urukora|URUKORA","urudakora|URUDAKORA"];
        //     nextSelect(optionArray);
        //     break;
        case 'imiryango':
            var optionArray = ["none|YOSE","isibo|ISIBO"];
            nextSelect(optionArray);
            break;
        case 'ingo':
            var optionArray = ["none|ZOSE","isibo|ISIBO"];
            nextSelect(optionArray);
            break;
        case 'ingamba':
            var optionArray = ["none|ZOSE","ibirezi|IBIREZI (0 - 5)","imbuto|IMBUTO (6 - 12)","indirira|INDIRIRA (13 - 18)","indahangarwa|INDAHANGARWA (19 - 35)","ingobokarugamba|INGOBOKARUGAMBA  (36 - 55)","inararibonye|INARARIBONYE (56 - Kuzamura)"];
            nextSelect(optionArray);
            break;
        default:
    }
}

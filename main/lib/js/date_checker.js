function checkDate(day,mon,year){
    day = document.getElementById(day);
    mon = document.getElementById(mon);
    year = document.getElementById(year);
    
    //mon30 = ['04','06','09','11'];
    //mon31 = ['01','03','05','07','08','10','12'];
    
    if((year.value) % 4 != 0){		// tahun non-kabisat
        if(mon.value == '02'){
            if(day.value > 28){
                window.alert('Bulan Februari tahun ini hanya memiliki 28 hari. Silahkan periksa isian anda.');
                day.value = 28;
                return false;
            }
        }
    }else{	// tahun kabisat
        if(mon.value == '02'){
            if(day.value > 29){
                window.alert('Bulan Februari tahun ini hanya memiliki 29 hari. Silahkan periksa isian anda.');
                day.value = 29;
                return false;
            }
        }
    }
    
    if (!get_mon_30(mon.value) && day.value > 31){
        window.alert('Bulan ini hanya memiliki 30 hari. Silahkan periksa isian anda.');
        day.value = 31;
        return false;
    }
    
    if (!get_mon_31(mon.value) && day.value > 30){
        window.alert('Bulan ini hanya memiliki 30 hari. Silahkan periksa isian anda.');
        day.value = 30;
        return false;
    }
}	

function get_mon_30(mon){
    mon30 = ['04','06','09','11'];
    for(var i =0; i<mon30.length; i++){
        if (mon30[i] == mon.value){
            return true;
        }else{
            return false;
        }
    }
}

function get_mon_31(mon){
    mon31 = ['01','03','05','07','08','10','12'];
    for(var i =0; i<mon31.length; i++){
        if (mon31[i] == mon){
            return true;
        }else{
            return false;
        }
    }
}
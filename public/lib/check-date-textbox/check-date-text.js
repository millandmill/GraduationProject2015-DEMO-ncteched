var v, i;
var res='111';
//ตัดเอาเฉพาะตัวเลข
function retnum(str) { 
    var num = str.replace(/[^0-9]/g, ''); 
    return num; 
}
//เอาชื่อ id ของ text id เฉพาะตัวเลข
function getval(isField){
    v = isField.value;
    i = isField.id;
    //res = i.substr(8, 2);
    res = retnum(i);
}
function validate(isField)
{
    splitDate = isField.value.split("-");
    refDate = new Date(isField.value);
    // YYYY-MM-DD
    if (splitDate[1] < 1 || splitDate[1] > 12 || refDate.getDate() != splitDate[2] || splitDate[0].length != 4 || (!/^19|20/.test(splitDate[0])))
    {
        alert('ป้อนวันที่ผิดรูปแบบ กรุณาป้อนในรูปแบบ : ปปปป-ดด-วว \nหรือท่านป้อนวันที่ผิด เช่น เดือน พฤศจิกายน บางปีมีแค่ 28 วัน เป็นต้น');
        isField.value = v;
        isField.focus();
    }
    else
    {
        //เช็ดวัน
        if(i.match(/date_start.*/))
        {
            if((document.getElementById(i).value)>(document.getElementById("date_end"+res).value))
            {
                var aa = isField.value;
                isField.value = document.getElementById("date_end"+res).value;
                if(isField.value ==='')
                {
                    document.getElementById("date_end"+res).value = '9999-99-99';
                    isField.value = aa;  
                }
            }
        }
        if(i.match(/date_end.*/))
        {
            if((document.getElementById(i).value)<(document.getElementById("date_start"+res).value))
            {
                isField.value = document.getElementById("date_start"+res).value;
                if(isField.value ==='')
                {
                    isField.value = v;
                }
            }
        }
        
    }  
}
//ให้พิมพ์ได้เฉพาะ 0-9 และเครื่องหมาย -
function isNumber(evt) 
{
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 45 || charCode > 57 ))
    {
        return false;
    }else
    {
        if((charCode===46)||(charCode===47))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}
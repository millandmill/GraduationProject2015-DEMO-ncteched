<link rel="stylesheet" href="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/lib/themes/default.css">
<link rel="stylesheet" href="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/lib/themes/default.date.css">
<link rel="stylesheet" href="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/lib/themes/default.time.css">

<script src="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/tests/jquery.1.7.0.js"></script>
<script src="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/lib/picker.js"></script>
<script src="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/lib/picker.date.js"></script>
<script src="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/lib/legacy.js"></script>
<script src="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/lib/picker.time.js"></script>
<script src="<?php echo base_url().'public/lib/';?>pickadate.js3.5.6/lib/translations/th_TH.js"></script>

<?php
    if($this->session->userdata('user_id') == ""){ redirect('welcome/logout'); }
    
    if(isset($program_date_edit)){
        $resultData = $program_date_edit;
    } 
?>

<script>
$(document).ready(function() {
    $('#date').pickadate({
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true
    }); 
    
    $('#times_start').pickatime({
     formatSubmit: 'HH:i',
     format: 'HH:i',
     hiddenName: true         
    });
    
    $('#times_end').pickatime({
     formatSubmit: 'HH:i',
     format: 'HH:i',
     hiddenName: true         
    });
    
    window.Picker=function(e,t){function n(r,i,o,a){function s(){return n._.node("div",n._.node("div",n._.node("div",n._.node("div",h.component.nodes(u.open),d.box),d.wrap),d.frame),d.holder)}function c(){h.open(),h.$root.addClass(d.focused)}if(!r)return n;var u={id:Math.abs(~~(1e9*Math.random()))},l=o?$.extend(!0,{},o.defaults,a):a||{},d=$.extend({},n.klasses(),l.klass),m=$(r),p=function(){return this.start()},h=p.prototype={constructor:p,$node:m,start:function(){return u&&u.start?h:(u.methods={},u.start=!0,u.open=!1,u.type=r.type,r.autofocus=r==document.activeElement,r.type="text",r.readOnly=!0,h.component=new o(h,l),h.$root=$(n._.node("div",s(),d.picker)).on({focusin:function(e){h.$root.removeClass(d.focused),e.stopPropagation()},mousedown:function(e){e.target!=h.$root.children()[0]&&e.stopPropagation()},click:function(e){var t=e.target,i=$(t),o=i.data();t!=h.$root.children()[0]&&(e.stopPropagation(),h.$root.find(document.activeElement).length||r.focus(),o.nav&&!i.hasClass(d.navDisabled)?h.set("highlight",h.component.item.highlight,{nav:o.nav}):n._.isInteger(o.pick)&&!i.hasClass(d.disabled)?h.set({select:o.pick,highlight:o.pick}).close(!0):o.clear&&h.clear().close(!0))}}),h._hidden=l.formatSubmit?$("<input type=hidden name="+r.name+(l.hiddenSuffix||"_submit")+(m.data("value")?' value="'+n._.trigger(h.component.formats.toString,h.component,[l.formatSubmit,h.component.item.select]):"")+'">')[0]:t,m.addClass(d.input).on("focus.P"+u.id,c).on("click.P"+u.id,h.open).on("change.P"+u.id,function(){h._hidden&&(h._hidden.value=r.value?n._.trigger(h.component.formats.toString,h.component,[l.formatSubmit,h.component.item.select]):"")}).on("keydown.P"+u.id,function(e){var n=e.keyCode,r=/^(8|46)$/.test(n);return 27==n?(h.close(),!1):((32==n||r||!u.open&&h.component.key[n])&&(e.preventDefault(),e.stopPropagation(),r?h.clear().close():h.open()),t)}).val(m.data("value")?n._.trigger(h.component.formats.toString,h.component,[l.format,h.component.item.select]):"").after(h.$root,h._hidden).data(i,h),h.on({start:h.component.onStart,render:h.component.onRender,stop:h.component.onStop,open:h.component.onOpen,close:h.component.onClose,set:h.component.onSet}).on({start:l.onStart,render:l.onRender,stop:l.onStop,open:l.onOpen,close:l.onClose,set:l.onSet}),r.autofocus&&h.open(),h.trigger("start").trigger("render"))},render:function(){return h.$root.html(s()),h.trigger("render")},stop:function(){return u.start?(h.close(),h._hidden&&h._hidden.parentNode.removeChild(h._hidden),h.$root.remove(),m.removeClass(d.input).off(".P"+u.id).removeData(i),r.type=u.type,r.readOnly=!1,h.trigger("stop"),u.methods={},u.start=!1,h):h},open:function(t){return u.open?h:(m.addClass(d.active),h.$root.addClass(d.opened),t!==!1&&(u.open=!0,m.focus(),e.on("click.P"+u.id+" focusin.P"+u.id,function(e){e.target!=r&&e.target!=document&&h.close()}).on("keydown.P"+u.id,function(e){var t=e.keyCode,i=h.component.key[t],o=e.target;27==t?h.close(!0):o!=r||!i&&13!=t?h.$root.find(o).length&&13==t&&(e.preventDefault(),o.click()):(e.preventDefault(),i?n._.trigger(h.component.key.go,h,[i]):h.set("select",h.component.item.highlight).close())})),h.trigger("open"))},close:function(t){return t&&(m.off("focus.P"+u.id).focus(),setTimeout(function(){m.on("focus.P"+u.id,c)},0)),m.removeClass(d.active),h.$root.removeClass(d.opened+" "+d.focused),u.open?(u.open=!1,e.off(".P"+u.id),h.trigger("close")):h},clear:function(){return h.set("clear")},set:function(e,t,r){var i,o,a=n._.isObject(e),s=a?e:{};if(e){a||(s[e]=t);for(i in s)o=s[i],h.component.item[i]&&h.component.set(i,o,r||{}),("select"==i||"clear"==i)&&m.val("clear"==i?"":n._.trigger(h.component.formats.toString,h.component,[l.format,h.component.get(i)])).trigger("change");h.render()}return h.trigger("set",s)},get:function(e,i){return e=e||"value",null!=u[e]?u[e]:"value"==e?r.value:h.component.item[e]?"string"==typeof i?n._.trigger(h.component.formats.toString,h.component,[i,h.component.get(e)]):h.component.get(e):t},on:function(e,t){var r,i,o=n._.isObject(e),a=o?e:{};if(e){o||(a[e]=t);for(r in a)i=a[r],u.methods[r]=u.methods[r]||[],u.methods[r].push(i)}return h},trigger:function(e,t){var r=u.methods[e];return r&&r.map(function(e){n._.trigger(e,h,[t])}),h}};return new p}return n.klasses=function(e){return e=e||"picker",{picker:e,opened:e+"--opened",focused:e+"--focused",input:e+"__input",active:e+"__input--active",holder:e+"__holder",frame:e+"__frame",wrap:e+"__wrap",box:e+"__box"}},n._={group:function(e){for(var t,r="",i=n._.trigger(e.min,e);n._.trigger(e.max,e,[i])>=i;i+=e.i)t=n._.trigger(e.item,e,[i]),r+=n._.node(e.node,t[0],t[1],t[2]);return r},node:function(e,t,n,r){return t?(t=Array.isArray(t)?t.join(""):t,n=n?' class="'+n+'"':"",r=r?" "+r:"","<"+e+n+r+">"+t+"</"+e+">"):""},lead:function(e){return(10>e?"0":"")+e},trigger:function(e,t,n){return"function"==typeof e?e.apply(t,n||[]):e},digits:function(e){return/\d/.test(e[1])?2:1},isObject:function(e){return{}.toString.call(e).indexOf("Object")>-1},isDate:function(e){return{}.toString.call(e).indexOf("Date")>-1},isInteger:function(e){return{}.toString.call(e).indexOf("Number")>-1&&0===e%1}},n.extend=function(e,t){$.fn[e]=function(r,i){var o=this.data(e);return"picker"==r?o:o&&"string"==typeof r?(n._.trigger(o[r],o,[i]),this):this.each(function(){var i=$(this);i.data(e)||new n(this,e,t,r)})},$.fn[e].defaults=t.defaults},n}($(document));


/*!
 * pickadate.js v3.0.0-alpha, 2013-05-14
 * By Amsul, http://amsul.ca
 * Hosted on http://amsul.github.io/pickadate.js
 * Licensed under MIT
 */
(function(){function e(e,t){var i=this,n=e.$node.data("value");i.settings=t,i.queue={interval:"i",min:"measure create",max:"measure create",now:"now create",select:"parse create validate",highlight:"create validate",view:"create validate",disable:"flipItem",enable:"flipItem"},i.item={},i.item.interval=t.interval||30,i.item.disable=(t.disable||[]).slice(0),i.item.enable=-function(e){return e[0]===!0?e.shift():-1}(i.item.disable),i.set("min",t.min).set("max",t.max).set("now").set("select",n||e.$node[0].value||i.item.min,{format:n?t.formatSubmit:t.format}),i.key={40:1,38:-1,39:1,37:-1,go:function(e){i.set("highlight",i.item.highlight.pick+e*i.item.interval,{interval:e*i.item.interval}),this.render()}},e.on("render",function(){var n=e.$root.children(),r=n.find("."+t.klass.viewset);r.length?n[0].scrollTop=~~(r.position().top-2*r[0].clientHeight):console.warn("Nothing to viewset with",i.item.view)}).on("open",function(){e.$root.find("button").attr("disable",!1)}).on("close",function(){e.$root.find("button").attr("disable",!0)})}var t=24,i=60,n=12,r=t*i;e.prototype.set=function(e,t,i){var n=this;return n.item["enable"==e?"disable":"flip"==e?"enable":e]=n.queue[e].split(" ").map(function(r){return t=n[r](e,t,i)}).pop(),"select"==e?n.set("highlight",n.item.select,i):"highlight"==e?n.set("view",n.item.highlight,i):"interval"==e?n.set("min",n.item.min,i).set("max",n.item.max,i):("flip"==e||"min"==e||"max"==e||"disable"==e||"enable"==e)&&n.item.select&&n.item.highlight&&("min"==e&&n.set("max",n.item.max,i),n.set("select",n.item.select,i).set("highlight",n.item.highlight,i)),n},e.prototype.get=function(e){return this.item[e]},e.prototype.create=function(e,n,o){var a=this;return n=void 0===n?e:n,Picker._.isObject(n)&&Picker._.isInteger(n.pick)?n=n.pick:Array.isArray(n)?n=+n[0]*i+ +n[1]:Picker._.isInteger(n)||(n=a.now(e,n,o)),"max"==e&&a.item.min.pick>n&&(n+=r),n=a.normalize(n,o),{hour:~~(t+n/i)%t,mins:(i+n%i)%i,time:(r+n)%r,pick:n}},e.prototype.now=function(e,t){var n=new Date;return(Picker._.isInteger(t)?t+1:1)*this.item.interval+n.getHours()*i+n.getMinutes()},e.prototype.normalize=function(e){return e-((0>e?this.item.interval:0)+e%this.item.interval)},e.prototype.measure=function(e,n,r){var o=this;return n?n===!0||Picker._.isInteger(n)?n=o.now(e,n,r):Picker._.isObject(n)&&Picker._.isInteger(n.pick)&&(n=o.normalize(n.pick,r)):n="min"==e?[0,0]:[t-1,i-1],n},e.prototype.validate=function(e,t,i){var n=this,r=i&&i.interval?i.interval:n.item.interval;return n.disabled(t)&&(t=n.shift(t,r)),t=n.scope(t),n.disabled(t)&&(t=n.shift(t,-1*r)),t},e.prototype.disabled=function(e){var t=this,i=t.item.disable.filter(function(i){return Picker._.isInteger(i)?e.hour==i:Array.isArray(i)?e.pick==t.create(i).pick:void 0}).length;return-1===t.item.enable?!i:i},e.prototype.shift=function(e,t){for(var i=this;i.disabled(e)&&(e=i.create(e.pick+=t||i.item.interval),!(e.pick<=i.item.min.pick||e.pick>=i.item.max.pick)););return e},e.prototype.scope=function(e){var t=this.item.min.pick,i=this.item.max.pick;return this.create(e.pick>i?i:t>e.pick?t:e)},e.prototype.parse=function(e,t,n){var r=this,o={};if(!t||Picker._.isInteger(t)||Array.isArray(t)||Picker._.isDate(t)||Picker._.isObject(t)&&Picker._.isInteger(t.pick))return t;if(!n||!n.format)throw"Need a formatting option to parse this..";return r.formats.toArray(n.format).map(function(e){var i=r.formats[e],n=i?Picker._.trigger(i,r,[t,o]):e.replace(/^!/,"").length;i&&(o[e]=t.substr(0,n)),t=t.substr(n)}),+o.i+i*(+(o.H||o.HH)||+(o.h||o.hh)%12+(/^p/i.test(o.A||o.a)?12:0))},e.prototype.formats={h:function(e,t){return e?Picker._.digits(e):t.hour%n||n},hh:function(e,t){return e?2:Picker._.lead(t.hour%n||n)},H:function(e,t){return e?Picker._.digits(e):""+t.hour},HH:function(e,t){return e?Picker._.digits(e):Picker._.lead(t.hour)},i:function(e,t){return e?2:Picker._.lead(t.mins)},a:function(e,t){return e?4:r/2>t.time%r?"a.m.":"p.m."},A:function(e,t){return e?2:r/2>t.time%r?"AM":"PM"},toArray:function(e){return e.split(/(h{1,2}|H{1,2}|i|a|A|!.)/g)},toString:function(e,t){var i=this;return i.formats.toArray(e).map(function(e){return Picker._.trigger(i.formats[e],i,[0,t])||e.replace(/^!/,"")}).join("")}},e.prototype.flipItem=function(e,t){var i=this,n=i.item.disable,r=-1===i.item.enable;return"flip"==t?i.item.enable=r?1:-1:!r&&"enable"==e||r&&"disable"==e?n=i.removeDisabled(n,t):(!r&&"disable"==e||r&&"enable"==e)&&(n=i.addDisabled(n,t)),n},e.prototype.addDisabled=function(e,t){var i=this;return t.map(function(t){i.filterDisabled(e,t).length||e.push(t)}),e},e.prototype.removeDisabled=function(e,t){var i=this;return t.map(function(t){e=i.filterDisabled(e,t,1)}),e},e.prototype.filterDisabled=function(e,t,i){var n=Array.isArray(t);return e.filter(function(e){var r=!n&&t===e||n&&Array.isArray(e)&&""+t==""+e;return i?!r:r})},e.prototype.i=function(e,t){return Picker._.isInteger(t)&&t>0?t:this.item.interval},e.prototype.nodes=function(e){var t=this,i=t.settings,n=t.item.select,r=t.item.highlight,o=t.item.view,a=t.item.disable;return Picker._.node("ul",Picker._.group({min:t.item.min.pick,max:t.item.max.pick,i:t.item.interval,node:"li",item:function(e){return e=t.create(e),[Picker._.trigger(t.formats.toString,t,[Picker._.trigger(i.formatLabel,t,[e])||i.format,e]),function(s,c){return n&&n.pick==c&&s.push(i.klass.selected),r&&r.pick==c&&s.push(i.klass.highlighted),o&&o.pick==c&&s.push(i.klass.viewset),a&&t.disabled(e)&&s.push(i.klass.disabled),s.join(" ")}([i.klass.listItem],e.pick),"data-pick="+e.pick]}})+Picker._.node("li",Picker._.node("button",i.clear,i.klass.buttonClear,"data-clear=1"+(e?"":" disable"))),i.klass.list)},e.defaults=function(e){return{clear:"Clear",format:"h:i A",interval:30,klass:{picker:e+" "+e+"--time",holder:e+"__holder",list:e+"__list",listItem:e+"__list-item",disabled:e+"__list-item--disabled",selected:e+"__list-item--selected",highlighted:e+"__list-item--highlighted",viewset:e+"__list-item--viewset",now:e+"__list-item--now",buttonClear:e+"__button--clear"}}}(Picker.klasses().picker),Picker.extend("pickatime",e)})();







/**
 * Demo scripts
 */
var from_$input = $('#times_start').pickatime(),
    from_picker = from_$input.pickatime('picker')

var to_$input = $('#times_end').pickatime({
        formatLabel: function( timeObject ) {
            var minObject = this.get( 'min' ),
                hours = timeObject.hour - minObject.hour,
                mins = ( timeObject.mins - minObject.mins ) / 60,
                pluralize = function( number, word ) {
                    return number + ' ' + ( number === 1 ? word : word + 's' )
                }
            return '<b>H</b>:i <!i>a</!i> <sm!all>(' + pluralize( hours + mins, '!hour' ) + ')</sm!all>'
        }
    }),
    to_picker = to_$input.pickatime('picker')


// Check if there’s a “from” or “to” time to start with.
if ( from_picker.get('value') ) {
  to_picker.set('min', from_picker.get('select'))
}
if ( to_picker.get('value') ) {
  from_picker.set('max', to_picker.get('select') )
}

// When something is selected, update the “from” and “to” limits.
from_picker.on('set', function(event) {
  if ( event.select ) {
    to_picker.set('min', from_picker.get('select'))
  }
})
to_picker.on('set', function(event) {
  if ( event.select ) {
    from_picker.set('max', to_picker.get('select'))
  }
})
    
            
});
</script>


            <div class="col-xs-12 col-lg-9 col-sm-7 col-md-7">
                <div class="content">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <div class="thsarabunnew" style="font-size:1.6em;margin-top:6px;">
                                    <i class="fa fa-cubes"></i>&nbsp;จัดการกำหนดการประชุมวิชาการ
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12">                  
                                <form id="pickDateForm" method="POST" name="form_authen" action="program_date_edit">
                                    <div class="form-addproduct">
                                        <ul>
                                            <li><input type="hidden" name="program_date_id" value="<?php if(isset($resultData[0]['program_date_id'])){ echo $resultData[0]['program_date_id']; } ?>"/></li>       
                                            
                                            <li><span class="font12 thsarabunnew">ชื่อกิจกรรม</span></li>
                                            <b><li class="font8 thsarabunnew" style="color: red; text-align:right">กรอกตัวอักษรได้อีก <span class="font12 thsarabunnew" id="maxlength">1000</span> ตัว</li></b>
                                            <textarea rows="4" id="area" class="font12 thsarabunnew" name="program_date_name" ><?php if(isset($resultData[0]['program_date_name'])){ echo $resultData[0]['program_date_name']; } ?></textarea>
                                            
                                            <li><span class="font12 thsarabunnew">วัน/เดือน/ปี</span></li>
                                            <input data-validation="required" 
                                                   data-validation-error-msg-required="กรุณาใส่ วัน/เดือน/ปี ของกิจกรรมนี้"
                                                   type="text" class="font12 thsarabunnew" name="program_date_day" id="date" value="<?php if(isset($resultData[0]['program_date_day'])){ echo $resultData[0]['program_date_day']; } ?>"/>
                                            
                                            <li><span class="font12 thsarabunnew">เวลาเริ่ม</span></li>
                                            <input  data-validation="required" 
                                                    data-validation-error-msg-required="กรุณาเลือกเวลาเริ่มของกิจกรรมนี้"
                                                    type="text" class="font12 thsarabunnew" name="program_date_time_start" id="times_start" value="<?php if(isset($resultData[0]['program_date_time_start'])){ echo $resultData[0]['program_date_time_start']; } ?>"/>     
                                            <li><span class="font12 thsarabunnew">เวลาสิ้นสุด</span></li>
                                            <input  data-validation="required" 
                                                    data-validation-error-msg-required="กรุณาเลือกเวลาสิ้นสุดของกิจกรรมนี้"
                                                    type="text" class="font12 thsarabunnew" name="program_date_time_end" id="times_end" value="<?php if(isset($resultData[0]['program_date_time_end'])){ echo $resultData[0]['program_date_time_end']; } ?>"/>
                                            <?php if(validation_errors() != ''){ ?>
                                                <div class="alert alert-danger">
                                                    <span class="font12"><?php echo validation_errors(); ?></span>
                                                </div>
                                            <?php } ?>
                                            <li><input type="submit" value="เพิ่ม / แก้ไข"  class="bt-submit thsarabunnew" name="btn_submit"/>
                                                <br/><br/>
                                                <input type="reset" value="ยกเลิก" class="bt-reset thsarabunnew" name="btn_back" /> 
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                          </div><!-- class = row -->
                        </div>
                    </div>
                </div><!-- end content -->
            </div><!-- end col-xs-12 -->
        </div>
    </div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.20/jquery.form-validator.min.js"></script>
<script>
  $.validate({
    modules : 'location, date, security, file',
    onModulesLoaded : function() {
      $('#country').suggestCountry();
    }
  });

  // Restrict presentation length
  $('#presentation').restrictLength( $('#pres-max-length') );
          

</script>
<script>
  $.validate({
    lang: 'en'
  });
</script>
<script>
  $('#area').restrictLength($('#maxlength'));
</script>    
    

!function(){var a={},b=function(b){for(var c=a[b],e=c.deps,f=c.defn,g=e.length,h=new Array(g),i=0;i<g;++i)h[i]=d(e[i]);var j=f.apply(null,h);if(void 0===j)throw"module ["+b+"] returned undefined";c.instance=j},c=function(b,c,d){if("string"!=typeof b)throw"module id must be a string";if(void 0===c)throw"no dependencies for "+b;if(void 0===d)throw"no definition function for "+b;a[b]={deps:c,defn:d,instance:void 0}},d=function(c){var d=a[c];if(void 0===d)throw"module ["+c+"] was undefined";return void 0===d.instance&&b(c),d.instance},e=function(a,b){for(var c=a.length,e=new Array(c),f=0;f<c;++f)e.push(d(a[f]));b.apply(null,b)},f={};f.bolt={module:{api:{define:c,require:e,demand:d}}};var g=c,h=function(a,b){g(a,[],function(){return b})};h("3",tinymce.util.Tools.resolve),g("1",["3"],function(a){return a("tinymce.PluginManager")}),g("2",["3"],function(a){return a("tinymce.util.Tools")}),g("0",["1","2"],function(a,b){return a.add("insertdatetime",function(a){function c(b,c){function d(a,b){if(a=""+a,a.length<b)for(var c=0;c<b-a.length;c++)a="0"+a;return a}return c=c||new Date,b=b.replace("%D","%m/%d/%Y"),b=b.replace("%r","%I:%M:%S %p"),b=b.replace("%Y",""+c.getFullYear()),b=b.replace("%y",""+c.getYear()),b=b.replace("%m",d(c.getMonth()+1,2)),b=b.replace("%d",d(c.getDate(),2)),b=b.replace("%H",""+d(c.getHours(),2)),b=b.replace("%M",""+d(c.getMinutes(),2)),b=b.replace("%S",""+d(c.getSeconds(),2)),b=b.replace("%I",""+((c.getHours()+11)%12+1)),b=b.replace("%p",""+(c.getHours()<12?"AM":"PM")),b=b.replace("%B",""+a.translate(j[c.getMonth()])),b=b.replace("%b",""+a.translate(i[c.getMonth()])),b=b.replace("%A",""+a.translate(h[c.getDay()])),b=b.replace("%a",""+a.translate(g[c.getDay()])),b=b.replace("%%","%")}function d(b){var d=c(b);if(a.settings.insertdatetime_element){var e;e=c(/%[HMSIp]/.test(b)?"%Y-%m-%dT%H:%M":"%Y-%m-%d"),d='<time datetime="'+e+'">'+d+"</time>";var f=a.dom.getParent(a.selection.getStart(),"time");if(f)return void a.dom.setOuterHTML(f,d)}a.insertContent(d)}var e,f,g="Sun Mon Tue Wed Thu Fri Sat Sun".split(" "),h="Sunday Monday Tuesday Wednesday Thursday Friday Saturday Sunday".split(" "),i="Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec".split(" "),j="January February March April May June July August September October November December".split(" "),k=[];a.addCommand("mceInsertDate",function(){d(a.getParam("insertdatetime_dateformat",a.translate("%Y-%m-%d")))}),a.addCommand("mceInsertTime",function(){d(a.getParam("insertdatetime_timeformat",a.translate("%H:%M:%S")))}),a.addButton("insertdatetime",{type:"splitbutton",title:"Insert date/time",onclick:function(){d(e||f)},menu:k}),b.each(a.settings.insertdatetime_formats||["%H:%M:%S","%Y-%m-%d","%I:%M:%S %p","%D"],function(a){f||(f=a),k.push({text:c(a),onclick:function(){e=a,d(a)}})}),a.addMenuItem("insertdatetime",{icon:"date",text:"Date/time",menu:k,context:"insert"})}),function(){}}),d("0")()}();
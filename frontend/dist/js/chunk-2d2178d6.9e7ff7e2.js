(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d2178d6"],{c6e2:function(t,i,a){"use strict";a.r(i);var e=function(){var t=this,i=t.$createElement,a=t._self._c||i;return a("div",[a("loader",{attrs:{"first-time-only":"",listen:"sub_activities/edit"}},[a("div",{staticClass:"nk-block nk-block-lg"},[a("div",{staticClass:"nk-block-head"},[a("div",{staticClass:"nk-block-head-content"},[a("h4",{staticClass:"title nk-block-title"},[t._v("Sub Activities")]),a("div",{staticClass:"nk-block-des"},[a("p",[t._v("Kindly fill the form below to create/update an sub_activity.")])])])]),a("div",{staticClass:"card card-bordered"},[a("div",{staticClass:"card-inner"},[a("form",{staticClass:"gy-3",on:{submit:function(i){return i.preventDefault(),t.submitForm(i)}}},[a("div",{staticClass:"row g-1 align-center"},[a("div",{staticClass:"col-lg-3"},[a("div",{staticClass:"form-group"},[a("label",{staticClass:"form-label",attrs:{for:"site-name"}},[t._v("Name")]),a("span",{staticClass:"form-note"},[t._v("Sub Activity name")])])]),a("div",{staticClass:"col-lg-7"},[a("div",{staticClass:"form-group"},[a("div",{staticClass:"form-control-wrap"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.form.name,expression:"form.name"}],staticClass:"form-control",attrs:{type:"text",id:"site-name",required:""},domProps:{value:t.form.name},on:{input:function(i){i.target.composing||t.$set(t.form,"name",i.target.value)}}})])])])]),a("div",{staticClass:"row g-1 align-center"},[a("div",{staticClass:"col-lg-3"},[a("div",{staticClass:"form-group"},[a("label",{staticClass:"form-label",attrs:{for:"site-name"}},[t._v("Activity")]),a("span",{staticClass:"form-note"},[t._v("link to an activity")])])]),a("div",{staticClass:"col-lg-7"},[a("div",{staticClass:"form-control-wrap"},[a("select",{directives:[{name:"model",rawName:"v-model",value:t.form.activity_id,expression:"form.activity_id"}],staticClass:"form-select form-control",attrs:{"data-search":"on",required:""},on:{change:function(i){var a=Array.prototype.filter.call(i.target.options,(function(t){return t.selected})).map((function(t){var i="_value"in t?t._value:t.value;return i}));t.$set(t.form,"activity_id",i.target.multiple?a:a[0])}}},t._l(t.activities,(function(i){return a("option",{key:i.id,domProps:{value:i.id}},[t._v(t._s(i.name))])})),0)])])]),a("div",{staticClass:"row g-1 align-center"},[a("div",{staticClass:"col-lg-3"},[a("div",{staticClass:"form-group"},[a("label",{staticClass:"form-label",attrs:{for:"site-name"}},[t._v("Cover Photo")]),a("span",{staticClass:"form-note"},[t._v("Upload a cover photo for the sub activity")])])]),a("div",{staticClass:"col-lg-7"},[a("div",{staticClass:"form-group"},[a("div",{staticClass:"form-control-wrap"},[a("vue-dropzone",{ref:"myVueDropzone",attrs:{id:"dropzone",options:t.dropzoneOptions},on:{"vdropzone-file-added":t.sendingFile}})],1)])])]),a("div",{staticClass:"row g-3"},[a("div",{staticClass:"col-lg-7"},[a("div",{staticClass:"form-group mt-2"},[a("button",{staticClass:"btn btn-lg btn-primary",attrs:{type:"submit"}},[t._v(t._s(t.form.id?"Update Sub Activity":"Create Sub Activity")+" ")])])])])])])])])])],1)},s=[],o=a("5530"),r=a("2f62"),c=a("92c3"),l=a.n(c),n=(a("1e3f"),{components:{vueDropzone:l.a},created:function(){var t=this;this.getActivities({}),this.$route.params.id&&this.getSubActivity(this.$route.params.id).then((function(){t.form=t.sub_activity;var i={size:123,name:"Icon",type:"image/jpeg"},a=t.sub_activity.cover_photo;t.$refs.myVueDropzone.manuallyAddFile(i,a)}))},data:function(){return{dropzoneOptions:{maxFilesize:5,maxFiles:1,url:"api/sample-image-upload",autoProcessQueue:!1,thumbnailWidth:150,headers:{"My-Awesome-Header":"Click to upload an image"},addRemoveLinks:!0},form:{}}},computed:Object(o["a"])({},Object(r["c"])({sub_activity:"activities/sub_activity",activities:"activities/activities"})),methods:Object(o["a"])(Object(o["a"])({},Object(r["b"])({getSubActivity:"activities/getSubActivity",updateSubActivity:"activities/updateSubActivity",createSubActivity:"activities/createSubActivity",getActivities:"activities/getActivities"})),{},{sendingFile:function(t){this.form.cover_photo=t},submitForm:function(){this.form.id?this.updateSubActivity(this.form):this.createSubActivity(this.form)}})}),v=n,d=a("2877"),u=Object(d["a"])(v,e,s,!1,null,null,null);i["default"]=u.exports}}]);
//# sourceMappingURL=chunk-2d2178d6.9e7ff7e2.js.map
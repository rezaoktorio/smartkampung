/*
 Highcharts JS v5.0.12 (2017-05-24)
 Boost module

 (c) 2010-2017 Highsoft AS
 Author: Torstein Honsi

 License: www.highcharts.com/license
*/
(function(x){"object"===typeof module&&module.exports?module.exports=x:x(Highcharts)})(function(x){(function(h){function x(){var a=Array.prototype.slice.call(arguments),c=-Number.MAX_VALUE;C(a,function(a){if("undefined"!==typeof a&&"undefined"!==typeof a.length&&0<a.length)return c=a.length,!0});return c}function z(a){var c=0,d;if(1<a.series.length)for(var f=0;f<a.series.length;f++)d=a.series[f],x(d.processedXData,d.options.data,d.points)>=(d.options.boostThreshold||Number.MAX_VALUE)&&c++;return 5<
c||a.series.length>=G(a.options.boost&&a.options.boost.seriesThreshold,50)}function A(a){return z(a.chart)||x(a.processedXData,a.options.data,a.points)>=(a.options.boostThreshold||Number.MAX_VALUE)}function fa(a){function c(b,c){c=a.createShader("vertex"===c?a.VERTEX_SHADER:a.FRAGMENT_SHADER);a.shaderSource(c,b);a.compileShader(c);return a.getShaderParameter(c,a.COMPILE_STATUS)?c:!1}function d(){function d(b){return a.getUniformLocation(l,b)}var f=c("#version 100\nprecision highp float;\nattribute vec4 aVertexPosition;\nattribute vec4 aColor;\nvarying highp vec2 position;\nvarying highp vec4 vColor;\nuniform mat4 uPMatrix;\nuniform float pSize;\nuniform float translatedThreshold;\nuniform bool hasThreshold;\nuniform bool skipTranslation;\nuniform float xAxisTrans;\nuniform float xAxisMin;\nuniform float xAxisMinPad;\nuniform float xAxisPointRange;\nuniform float xAxisLen;\nuniform bool  xAxisPostTranslate;\nuniform float xAxisOrdinalSlope;\nuniform float xAxisOrdinalOffset;\nuniform float xAxisPos;\nuniform bool  xAxisCVSCoord;\nuniform float yAxisTrans;\nuniform float yAxisMin;\nuniform float yAxisMinPad;\nuniform float yAxisPointRange;\nuniform float yAxisLen;\nuniform bool  yAxisPostTranslate;\nuniform float yAxisOrdinalSlope;\nuniform float yAxisOrdinalOffset;\nuniform float yAxisPos;\nuniform bool  yAxisCVSCoord;\nuniform bool  isBubble;\nuniform bool  bubbleSizeByArea;\nuniform float bubbleZMin;\nuniform float bubbleZMax;\nuniform float bubbleZThreshold;\nuniform float bubbleMinSize;\nuniform float bubbleMaxSize;\nuniform bool  bubbleSizeAbs;\nuniform bool  isInverted;\nfloat bubbleRadius(){\nfloat value \x3d aVertexPosition.w;\nfloat zMax \x3d bubbleZMax;\nfloat zMin \x3d bubbleZMin;\nfloat radius \x3d 0.0;\nfloat pos \x3d 0.0;\nfloat zRange \x3d zMax - zMin;\nif (bubbleSizeAbs){\nvalue \x3d value - bubbleZThreshold;\nzMax \x3d max(zMax - bubbleZThreshold, zMin - bubbleZThreshold);\nzMin \x3d 0.0;\n}\nif (value \x3c zMin){\nradius \x3d bubbleZMin / 2.0 - 1.0;\n} else {\npos \x3d zRange \x3e 0.0 ? (value - zMin) / zRange : 0.5;\nif (bubbleSizeByArea \x26\x26 pos \x3e 0.0){\npos \x3d sqrt(pos);\n}\nradius \x3d ceil(bubbleMinSize + pos * (bubbleMaxSize - bubbleMinSize)) / 2.0;\n}\nreturn radius * 2.0;\n}\nfloat translate(float val,\nfloat pointPlacement,\nfloat localA,\nfloat localMin,\nfloat minPixelPadding,\nfloat pointRange,\nfloat len,\nbool  cvsCoord\n){\nfloat sign \x3d 1.0;\nfloat cvsOffset \x3d 0.0;\nif (cvsCoord) {\nsign *\x3d -1.0;\ncvsOffset \x3d len;\n}\nreturn sign * (val - localMin) * localA + cvsOffset + \n(sign * minPixelPadding);\n}\nfloat xToPixels(float value){\nif (skipTranslation){\nreturn value;// + xAxisPos;\n}\nreturn translate(value, 0.0, xAxisTrans, xAxisMin, xAxisMinPad, xAxisPointRange, xAxisLen, xAxisCVSCoord);// + xAxisPos;\n}\nfloat yToPixels(float value, float checkTreshold){\nfloat v;\nif (skipTranslation){\nv \x3d value;// + yAxisPos;\n} else {\nv \x3d translate(value, 0.0, yAxisTrans, yAxisMin, yAxisMinPad, yAxisPointRange, yAxisLen, yAxisCVSCoord);// + yAxisPos;\n}\nif (checkTreshold \x3e 0.0 \x26\x26 hasThreshold) {\nv \x3d min(v, translatedThreshold);\n}\nreturn v;\n}\nvoid main(void) {\nif (isBubble){\ngl_PointSize \x3d bubbleRadius();\n} else {\ngl_PointSize \x3d pSize;\n}\nvColor \x3d aColor;\nif (isInverted) {\ngl_Position \x3d uPMatrix * vec4(xToPixels(aVertexPosition.y) + yAxisPos, yToPixels(aVertexPosition.x, aVertexPosition.z) + xAxisPos, 0.0, 1.0);\n} else {\ngl_Position \x3d uPMatrix * vec4(xToPixels(aVertexPosition.x) + xAxisPos, yToPixels(aVertexPosition.y, aVertexPosition.z) + yAxisPos, 0.0, 1.0);\n}\n}",
"vertex"),e=c("precision highp float;\nuniform vec4 fillColor;\nvarying highp vec2 position;\nvarying highp vec4 vColor;\nuniform sampler2D uSampler;\nuniform bool isCircle;\nuniform bool hasColor;\nvoid main(void) {\nvec4 col \x3d fillColor;\nif (hasColor) {\ncol \x3d vColor;\n}\nif (isCircle) {\ngl_FragColor \x3d col * texture2D(uSampler, gl_PointCoord.st);\n} else {\ngl_FragColor \x3d col;\n}\n}","fragment");if(!f||!e)return l=!1;l=a.createProgram();a.attachShader(l,f);a.attachShader(l,e);a.linkProgram(l);
a.useProgram(l);a.bindAttribLocation(l,0,"aVertexPosition");h=d("uPMatrix");n=d("pSize");J=d("fillColor");H=d("isBubble");k=d("bubbleSizeAbs");t=d("bubbleSizeByArea");B=d("uSampler");b=d("skipTranslation");q=d("isCircle");g=d("isInverted");return!0}function f(b,c){b=e[b]=e[b]||a.getUniformLocation(l,b);a.uniform1f(b,c)}var e={},l,h,n,J,H,k,t,b,q,g,B;a&&d();return{psUniform:function(){return n},pUniform:function(){return h},fillColorUniform:function(){return J},setBubbleUniforms:function(b,c,d){var e=
b.options,l=Number.MAX_VALUE,h=-Number.MAX_VALUE;"bubble"===b.type&&(l=G(e.zMin,Math.min(l,Math.max(c,!1===e.displayNegative?e.zThreshold:-Number.MAX_VALUE))),h=G(e.zMax,Math.max(h,d)),a.uniform1i(H,1),a.uniform1i(q,1),a.uniform1i(t,"width"!==b.options.sizeBy),a.uniform1i(k,b.options.sizeByAbsoluteValue),f("bubbleZMin",l),f("bubbleZMax",h),f("bubbleZThreshold",b.options.zThreshold),f("bubbleMinSize",b.minPxSize),f("bubbleMaxSize",b.maxPxSize))},bind:function(){a.useProgram(l)},program:function(){return l},
create:d,setUniform:f,setPMatrix:function(b){a.uniformMatrix4fv(h,!1,b)},setColor:function(b){a.uniform4f(J,b[0]/255,b[1]/255,b[2]/255,b[3])},setPointSize:function(b){a.uniform1f(n,b)},setSkipTranslation:function(c){a.uniform1i(b,!0===c?1:0)},setTexture:function(){a.uniform1i(B,0)},setDrawAsCircle:function(b){a.uniform1i(q,b?1:0)},reset:function(){a.uniform1i(H,0);a.uniform1i(q,0)},setInverted:function(b){a.uniform1i(g,b)},destroy:function(){a&&l&&a.deleteProgram(l)}}}function X(a,c,d){var f=!1,e=
!1,l=d||2,h=!1,n=0,g;return{destroy:function(){f&&a.deleteBuffer(f)},bind:function(){if(!f)return!1;a.vertexAttribPointer(e,l,a.FLOAT,!1,0,0)},data:g,build:function(d,k,t){g=d||[];if(!(g&&0!==g.length||h))return f=!1;l=t||l;f&&a.deleteBuffer(f);f=a.createBuffer();a.bindBuffer(a.ARRAY_BUFFER,f);a.bufferData(a.ARRAY_BUFFER,h||new Float32Array(g),a.STATIC_DRAW);e=a.getAttribLocation(c.program(),k);a.enableVertexAttribArray(e);return!0},render:function(c,d,e){var b=h?h.length:g.length;if(!f||!b)return!1;
if(!c||c>b||0>c)c=0;if(!d||d>b)d=b;a.drawArrays(a[(e||"points").toUpperCase()],c/l,(d-c)/l);return!0},allocate:function(a){n=-1;h=new Float32Array(4*a)},push:function(a,c,d,b){h&&(h[++n]=a,h[++n]=c,h[++n]=d,h[++n]=b)}}}function ga(a){function c(a){var b,c;return A(a)?(b=!!a.options.stacking,c=a.xData||a.options.xData||a.processedXData,b=(b?a.data:c||a.options.data).length,"treemap"===a.type?b*=12:"heatmap"===a.type?b*=6:N[a.type]&&(b*=2),b):0}function d(){b.clear(b.COLOR_BUFFER_BIT|b.DEPTH_BUFFER_BIT)}
function f(a,b){function c(a){a&&(b.colorData.push(a[0]),b.colorData.push(a[1]),b.colorData.push(a[2]),b.colorData.push(a[3]))}function d(a,b,d,e,f){c(f);r.usePreallocated?t.push(a,b,d?1:0,e||1):(B.push(a),B.push(b),B.push(d?1:0),B.push(e||1))}function e(a,b,e,f,v){c(v);d(a+e,b);c(v);d(a,b);c(v);d(a,b+f);c(v);d(a,b+f);c(v);d(a+e,b+f);c(v);d(a+e,b)}function f(a){r.useGPUTranslations||(b.skipTranslation=!0,a.x=A.toPixels(a.x,!0),a.y=F.toPixels(a.y,!0));d(a.x,a.y,0,2)}var v=a.pointArrayMap&&"low,high"===
a.pointArrayMap.join(","),k=a.chart,m=a.options,l=!!m.stacking,g=m.data,n=a.xAxis.getExtremes(),q=n.min,u=n.max,n=a.yAxis.getExtremes(),w=n.min,z=n.max,n=a.xData||m.xData||a.processedXData,x=a.yData||m.yData||a.processedYData,p=a.zData||m.zData||a.processedZData,F=a.yAxis,A=a.xAxis,E=!n||0===n.length,y=a.points||!1,J=!1,H,K,L,I=l?a.data:n||g,D={x:Number.MIN_VALUE,y:0},R={x:Number.MIN_VALUE,y:0};m.boostData&&0<m.boostData.length||(a.closestPointRangePx=Number.MAX_VALUE,y&&0<y.length?(b.skipTranslation=
!0,b.drawMode="triangles",y[0].node&&y[0].node.levelDynamic&&y.sort(function(a,b){if(a.node){if(a.node.levelDynamic>b.node.levelDynamic)return 1;if(a.node.levelDynamic<b.node.levelDynamic)return-1}return 0}),C(y,function(b){var c=b.plotY,d;void 0===c||isNaN(c)||null===b.y||(c=b.shapeArgs,d=b.series.colorAttribs(b),b=d["stroke-width"]||0,K=h.color(d.fill).rgba,K[0]/=255,K[1]/=255,K[2]/=255,"treemap"===a.type&&(b=b||1,L=h.color(d.stroke).rgba,L[0]/=255,L[1]/=255,L[2]/=255,e(c.x,c.y,c.width,c.height,
L),b/=2),e(c.x+b,c.y+b,c.width-2*b,c.height-2*b,K))})):(C(I,function(c,e){var f,m,h,n=!1,P=!1,g=!1,Y=!1,ha=N[a.type],t=!1,y=!0;if("undefined"===typeof k.index)return!1;E?(f=c[0],m=c[1],I[e+1]&&(P=I[e+1][0]),I[e-1]&&(n=I[e-1][0]),3<=c.length&&(h=c[2],c[2]>b.zMax&&(b.zMax=c[2]),c[2]<b.zMin&&(b.zMin=c[2]))):(f=c,m=x[e],I[e+1]&&(P=I[e+1]),I[e-1]&&(n=I[e-1]),p&&p.length&&(h=p[e],p[e]>b.zMax&&(b.zMax=p[e]),p[e]<b.zMin&&(b.zMin=p[e])));P&&P>=q&&P<=u&&(g=!0);n&&n>=q&&n<=u&&(Y=!0);v?(E&&(m=c.slice(1,3)),m=
m[1]):l&&(f=c.x,m=c.stackY);a.requireSorting||(y=m>=w&&m<=z);f>u&&R.x<u&&(R.x=f,R.y=m);f<q&&D.x<q&&(D.x=f,D.y=m);if(0===m||m&&y)if(f>=q&&f<=u&&(t=!0),t||g||Y)r.useGPUTranslations||(b.skipTranslation=!0,f=A.toPixels(f,!0),m=F.toPixels(m,!0)),ha&&(H=0,0>m&&(H=m,m=0),r.useGPUTranslations||(H=F.toPixels(H,!0)),d(f,H,0,0,!1)),b.hasMarkers&&!1!==J&&(a.closestPointRangePx=Math.min(a.closestPointRangePx,Math.abs(f-J))),d(f,m,0,"bubble"===a.type?h||1:2,!1),J=f}),J||(f(D),f(R))))}function e(){u=[];y.data=B=
[];p=[]}function l(a){k&&(k.setUniform("xAxisTrans",a.transA),k.setUniform("xAxisMin",a.min),k.setUniform("xAxisMinPad",a.minPixelPadding),k.setUniform("xAxisPointRange",a.pointRange),k.setUniform("xAxisLen",a.len),k.setUniform("xAxisPos",a.pos),k.setUniform("xAxisCVSCoord",!a.horiz))}function g(a){k&&(k.setUniform("yAxisTrans",a.transA),k.setUniform("yAxisMin",a.min),k.setUniform("yAxisMinPad",a.minPixelPadding),k.setUniform("yAxisPointRange",a.pointRange),k.setUniform("yAxisLen",a.len),k.setUniform("yAxisPos",
a.pos),k.setUniform("yAxisCVSCoord",!a.horiz))}function n(a,b){k.setUniform("hasThreshold",a);k.setUniform("translatedThreshold",b)}function w(c){if(c)q=c.chartWidth||800,F=c.chartHeight||400;else return!1;if(!b||!q||!F)return!1;r.timeRendering&&console.time("gl rendering");k.bind();b.viewport(0,0,q,F);k.setPMatrix([2/q,0,0,0,0,-(2/F),0,0,0,0,-2,0,-1,1,-1,1]);1<r.lineWidth&&!h.isMS&&b.lineWidth(r.lineWidth);t.build(y.data,"aVertexPosition",4);t.bind();x&&(b.bindTexture(b.TEXTURE_2D,D),k.setTexture(D));
k.setInverted(c.options.chart?c.options.chart.inverted:!1);C(u,function(a,c){var d=a.series.options,e=d.threshold,f=Q(e),e=a.series.yAxis.getThreshold(e),m=G(d.marker?d.marker.enabled:null,a.series.xAxis.isRadial?!0:null,a.series.closestPointRangePx>2*((d.marker?d.marker.radius:10)||10)),v=a.series.fillOpacity?(new Z(a.series.color)).setOpacity(G(d.fillOpacity,.85)).get():a.series.color;t.bind();d.colorByPoint&&(v=a.series.chart.options.colors[c]);v=h.color(v).rgba;r.useAlpha||(v[3]=1);"add"===d.boostBlending?
(b.blendFunc(b.SRC_ALPHA,b.ONE),b.blendEquation(b.FUNC_ADD)):"mult"===d.boostBlending?b.blendFunc(b.DST_COLOR,b.ZERO):"darken"===d.boostBlending?(b.blendFunc(b.ONE,b.ONE),b.blendEquation(b.FUNC_MIN)):b.blendFuncSeparate(b.SRC_ALPHA,b.ONE_MINUS_SRC_ALPHA,b.ONE,b.ONE_MINUS_SRC_ALPHA);k.reset();0<a.colorData.length&&(k.setUniform("hasColor",1),c=X(b,k),c.build(a.colorData,"aColor",4),c.bind());k.setColor(v);l(a.series.xAxis);g(a.series.yAxis);n(f,e);"points"===a.drawMode&&(d.marker&&d.marker.radius?
k.setPointSize(2*d.marker.radius):k.setPointSize(1));k.setSkipTranslation(a.skipTranslation);"bubble"===a.series.type&&k.setBubbleUniforms(a.series,a.zMin,a.zMax);k.setDrawAsCircle(ia[a.series.type]&&x||!1);t.render(a.from,a.to,a.drawMode);a.hasMarkers&&m&&(d.marker&&d.marker.radius?k.setPointSize(2*d.marker.radius):k.setPointSize(10),k.setDrawAsCircle(!0),t.render(a.from,a.to,"POINTS"))});t.destroy();r.timeRendering&&console.timeEnd("gl rendering");e();a&&a()}function z(a){d();if(a.renderer.forExport)return w(a);
E?w(a):setTimeout(function(){z(a)},1)}var k=!1,t=!1,b=!1,q=0,F=0,B=!1,p=!1,x=!1,y={},E=!1,u=[],M=U.createElement("canvas"),O=M.getContext("2d"),D,N={column:!0,area:!0},ia={scatter:!0,bubble:!0},r={pointSize:1,lineWidth:3,fillColor:"#AA00AA",useAlpha:!0,usePreallocated:!1,useGPUTranslations:!1,timeRendering:!1,timeSeriesProcessing:!1,timeSetup:!1};return y={allocateBufferForSingleSeries:function(a){var b=0;r.usePreallocated&&(A(a)&&(b=c(a)),t.allocate(b))},pushSeries:function(a){0<u.length&&(u[u.length-
1].to=B.length,u[u.length-1].hasMarkers&&(u[u.length-1].markerTo=p.length));r.timeSeriesProcessing&&console.time("building "+a.type+" series");u.push({from:B.length,markerFrom:p.length,colorData:[],series:a,zMin:Number.MAX_VALUE,zMax:-Number.MAX_VALUE,hasMarkers:a.options.marker?!1!==a.options.marker.enabled:!1,showMarksers:!0,drawMode:{area:"lines",arearange:"lines",areaspline:"line_strip",column:"lines",line:"line_strip",scatter:"points",heatmap:"triangles",treemap:"triangles",bubble:"points"}[a.type]||
"line_strip"});f(a,u[u.length-1]);r.timeSeriesProcessing&&console.timeEnd("building "+a.type+" series")},setSize:function(a,b){if(q!==a||b!==b)q=a,F=b,k.bind(),k.setPMatrix([2/q,0,0,0,0,-(2/F),0,0,0,0,-2,0,-1,1,-1,1])},inited:function(){return E},setThreshold:n,init:function(a,c){var d=0,f=["webgl","experimental-webgl","moz-webgl","webkit-3d"];E=!1;if(!a)return!1;for(r.timeSetup&&console.time("gl setup");d<f.length&&!(b=a.getContext(f[d]));d++);if(b)c||e();else return!1;b.enable(b.BLEND);b.blendFunc(b.SRC_ALPHA,
b.ONE_MINUS_SRC_ALPHA);b.disable(b.DEPTH_TEST);b.depthMask(b.FALSE);k=fa(b);t=X(b,k);x=!1;D=b.createTexture();M.width=512;M.height=512;O.fillStyle="#FFF";O.beginPath();O.arc(256,256,256,0,2*Math.PI);O.fill();try{b.bindTexture(b.TEXTURE_2D,D),b.texImage2D(b.TEXTURE_2D,0,b.RGBA,b.RGBA,b.UNSIGNED_BYTE,M),b.texParameteri(b.TEXTURE_2D,b.TEXTURE_WRAP_S,b.CLAMP_TO_EDGE),b.texParameteri(b.TEXTURE_2D,b.TEXTURE_WRAP_T,b.CLAMP_TO_EDGE),b.texParameteri(b.TEXTURE_2D,b.TEXTURE_MAG_FILTER,b.LINEAR),b.texParameteri(b.TEXTURE_2D,
b.TEXTURE_MIN_FILTER,b.LINEAR_MIPMAP_LINEAR),b.generateMipmap(b.TEXTURE_2D),b.bindTexture(b.TEXTURE_2D,null),x=!0}catch(oa){}E=!0;r.timeSetup&&console.timeEnd("gl setup");return!0},render:z,settings:r,valid:function(){return!1!==b},clear:d,flush:e,setXAxis:l,setYAxis:g,data:B,gl:function(){return b},allocateBuffer:function(a){var b=0;r.usePreallocated&&(C(a.series,function(a){A(a)&&(b+=c(a))}),t.allocate(b))},destroy:function(){t.destroy();k.destroy()},setOptions:function(a){ja(!0,r,a)}}}function aa(a,
c){var d=a.chartWidth,f=a.chartHeight,e=a,l=a.seriesGroup||c.group,g=function(a,d,e,f,h,b,l){a.call(c,e,d,f,h,b,l)},e=z(a)?a:c;e.image||(e.canvas=U.createElement("canvas"),e.image=a.renderer.image("",0,0,d,f).add(l),e.boostClipRect=a.renderer.clipRect(a.plotLeft,a.plotTop,a.plotWidth,a.chartHeight),e.image.clip(e.boostClipRect),e.inverted&&C(["moveTo","lineTo","rect","arc"],function(a){w(!1,a,g)}),e instanceof h.Chart&&(e.markerGroup=e.renderer.g().add(l),e.markerGroup.translate(c.xAxis.pos,c.yAxis.pos)));
e.canvas.width=d;e.canvas.height=f;e.image.attr({x:0,y:0,width:d,height:f,style:"pointer-events: none"});e.boostClipRect.attr({x:a.plotLeft,y:a.plotTop,width:a.plotWidth,height:a.chartHeight});e.ogl||(e.ogl=ga(function(){e.image.attr({href:e.canvas.toDataURL("image/png")})}),e.ogl.init(e.canvas),e.ogl.setOptions(a.options.boost||{}),e instanceof h.Chart&&e.ogl.allocateBuffer(a));e.ogl.setSize(d,f);return e.ogl}function ba(a,c,d){a&&c.image&&c.canvas&&!z(d||c.chart)&&a.render(d||c.chart)}function ca(a,
c){a&&c.image&&c.canvas&&!z(c.chart)&&a.allocateBufferForSingleSeries(c)}function S(a,c,d,f,e,h){e=e||0;f=f||5E4;for(var l=e+f,g=!0;g&&e<l&&e<a.length;)g=c(a[e],e),++e;g&&(e<a.length?h?S(a,c,d,f,e,h):T.requestAnimationFrame?T.requestAnimationFrame(function(){S(a,c,d,f,e)}):setTimeout(function(){S(a,c,d,f,e)}):d&&d())}function ka(a){if(!A(this))return a.call(this);if(a=aa(this.chart,this))ca(a,this),a.pushSeries(this);ba(a,this)}var T=h.win,U=T.document,la=function(){},Z=h.Color,p=h.Series,g=h.seriesTypes,
C=h.each,da=h.extend,ea=h.addEvent,ma=h.fireEvent,na=h.grep,Q=h.isNumber,ja=h.merge,G=h.pick,w=h.wrap,V=h.getOptions().plotOptions,W;Z.prototype.names={aliceblue:"#f0f8ff",antiquewhite:"#faebd7",aqua:"#00ffff",aquamarine:"#7fffd4",azure:"#f0ffff",beige:"#f5f5dc",bisque:"#ffe4c4",black:"#000000",blanchedalmond:"#ffebcd",blue:"#0000ff",blueviolet:"#8a2be2",brown:"#a52a2a",burlywood:"#deb887",cadetblue:"#5f9ea0",chartreuse:"#7fff00",chocolate:"#d2691e",coral:"#ff7f50",cornflowerblue:"#6495ed",cornsilk:"#fff8dc",
crimson:"#dc143c",cyan:"#00ffff",darkblue:"#00008b",darkcyan:"#008b8b",darkgoldenrod:"#b8860b",darkgray:"#a9a9a9",darkgreen:"#006400",darkkhaki:"#bdb76b",darkmagenta:"#8b008b",darkolivegreen:"#556b2f",darkorange:"#ff8c00",darkorchid:"#9932cc",darkred:"#8b0000",darksalmon:"#e9967a",darkseagreen:"#8fbc8f",darkslateblue:"#483d8b",darkslategray:"#2f4f4f",darkturquoise:"#00ced1",darkviolet:"#9400d3",deeppink:"#ff1493",deepskyblue:"#00bfff",dimgray:"#696969",dodgerblue:"#1e90ff",feldspar:"#d19275",firebrick:"#b22222",
floralwhite:"#fffaf0",forestgreen:"#228b22",fuchsia:"#ff00ff",gainsboro:"#dcdcdc",ghostwhite:"#f8f8ff",gold:"#ffd700",goldenrod:"#daa520",gray:"#808080",green:"#008000",greenyellow:"#adff2f",honeydew:"#f0fff0",hotpink:"#ff69b4",indianred:"#cd5c5c",indigo:"#4b0082",ivory:"#fffff0",khaki:"#f0e68c",lavender:"#e6e6fa",lavenderblush:"#fff0f5",lawngreen:"#7cfc00",lemonchiffon:"#fffacd",lightblue:"#add8e6",lightcoral:"#f08080",lightcyan:"#e0ffff",lightgoldenrodyellow:"#fafad2",lightgrey:"#d3d3d3",lightgreen:"#90ee90",
lightpink:"#ffb6c1",lightsalmon:"#ffa07a",lightseagreen:"#20b2aa",lightskyblue:"#87cefa",lightslateblue:"#8470ff",lightslategray:"#778899",lightsteelblue:"#b0c4de",lightyellow:"#ffffe0",lime:"#00ff00",limegreen:"#32cd32",linen:"#faf0e6",magenta:"#ff00ff",maroon:"#800000",mediumaquamarine:"#66cdaa",mediumblue:"#0000cd",mediumorchid:"#ba55d3",mediumpurple:"#9370d8",mediumseagreen:"#3cb371",mediumslateblue:"#7b68ee",mediumspringgreen:"#00fa9a",mediumturquoise:"#48d1cc",mediumvioletred:"#c71585",midnightblue:"#191970",
mintcream:"#f5fffa",mistyrose:"#ffe4e1",moccasin:"#ffe4b5",navajowhite:"#ffdead",navy:"#000080",oldlace:"#fdf5e6",olive:"#808000",olivedrab:"#6b8e23",orange:"#ffa500",orangered:"#ff4500",orchid:"#da70d6",palegoldenrod:"#eee8aa",palegreen:"#98fb98",paleturquoise:"#afeeee",palevioletred:"#d87093",papayawhip:"#ffefd5",peachpuff:"#ffdab9",peru:"#cd853f",pink:"#ffc0cb",plum:"#dda0dd",powderblue:"#b0e0e6",purple:"#800080",red:"#ff0000",rosybrown:"#bc8f8f",royalblue:"#4169e1",saddlebrown:"#8b4513",salmon:"#fa8072",
sandybrown:"#f4a460",seagreen:"#2e8b57",seashell:"#fff5ee",sienna:"#a0522d",silver:"#c0c0c0",skyblue:"#87ceeb",slateblue:"#6a5acd",slategray:"#708090",snow:"#fffafa",springgreen:"#00ff7f",steelblue:"#4682b4",tan:"#d2b48c",teal:"#008080",thistle:"#d8bfd8",tomato:"#ff6347",turquoise:"#40e0d0",violet:"#ee82ee",violetred:"#d02090",wheat:"#f5deb3",white:"#ffffff",whitesmoke:"#f5f5f5",yellow:"#ffff00",yellowgreen:"#9acd32"};p.prototype.getPoint=function(a){var c=a,d=this.xData||this.options.xData||this.processedXData||
!1;!a||a instanceof this.pointClass||(c=(new this.pointClass).init(this,this.options.data[a.i],d?d[a.i]:void 0),c.category=c.x,c.dist=a.dist,c.distX=a.distX,c.plotX=a.plotX,c.plotY=a.plotY,c.index=a.i);return c};w(p.prototype,"searchPoint",function(a){return this.getPoint(a.apply(this,[].slice.call(arguments,1)))});w(p.prototype,"destroy",function(a){var c=this,d=c.chart;d.markerGroup===c.markerGroup&&(c.markerGroup=null);d.hoverPoints&&(d.hoverPoints=na(d.hoverPoints,function(a){return a.series===
c}));d.hoverPoint&&d.hoverPoint.series===c&&(d.hoverPoint=null);a.call(this)});w(p.prototype,"getExtremes",function(a){if(!A(this)||!this.hasExtremes||!this.hasExtremes())return a.apply(this,Array.prototype.slice.call(arguments,1))});C("area arearange column line scatter heatmap bubble treemap heatmap".split(" "),function(a){V[a]&&(V[a].boostThreshold=5E3,V[a].boostData=[])});C(["translate","generatePoints","drawTracker","drawPoints","render"],function(a){function c(c){var d=this.options.stacking&&
("translate"===a||"generatePoints"===a);if(!A(this)||d||"heatmap"===this.type||"treemap"===this.type)"render"===a&&this.image&&!z(this.chart)&&(this.image.attr({href:""}),this.animate=null),c.call(this);else if(this[a+"Canvas"])this[a+"Canvas"]()}w(p.prototype,a,c);"translate"===a&&(g.column&&w(g.column.prototype,a,c),g.arearange&&w(g.arearange.prototype,a,c),g.treemap&&w(g.treemap.prototype,a,c))});(function(){var a=0,c,d=["webgl","experimental-webgl","moz-webgl","webkit-3d"],f=!1;if("undefined"!==
typeof T.WebGLRenderingContext)for(c=U.createElement("canvas");a<d.length;a++)try{if(f=c.getContext(d[a]),"undefined"!==typeof f&&null!==f)return!0}catch(e){}return!1})()?(w(p.prototype,"processData",function(a){A(this)&&"heatmap"!==this.type&&"treemap"!==this.type||a.apply(this,Array.prototype.slice.call(arguments,1));this.hasExtremes&&this.hasExtremes(!0)||a.apply(this,Array.prototype.slice.call(arguments,1))}),h.extend(p.prototype,{pointRange:0,directTouch:!1,allowDG:!1,hasExtremes:function(a){var c=
this.options,d=this.xAxis&&this.xAxis.options,f=this.yAxis&&this.yAxis.options;return c.data.length>(c.boostThreshold||Number.MAX_VALUE)&&Q(f.min)&&Q(f.max)&&(!a||Q(d.min)&&Q(d.max))},destroyGraphics:function(){var a=this,c=this.points,d,f;if(c)for(f=0;f<c.length;f+=1)(d=c[f])&&d.graphic&&(d.graphic=d.graphic.destroy());C(["graph","area","tracker"],function(c){a[c]&&(a[c]=a[c].destroy())})},renderCanvas:function(){var a=this,c=a.options||{},d=!1,f=a.chart,e=this.xAxis,h=this.yAxis,g=c.xData||a.processedXData,
n=c.yData||a.processedYData,p=c.data,d=e.getExtremes(),w=d.min,k=d.max,d=h.getExtremes(),t=d.min,b=d.max,q={},x,B=!!a.sampling,A,C=!1!==c.enableMouseTracking,y=h.getThreshold(c.threshold),E=a.pointArrayMap&&"low,high"===a.pointArrayMap.join(","),u=!!c.stacking,M=a.cropStart||0,O=a.requireSorting,D=!g,N,G,r,v,m=function(a,b,c){W=a+","+b;C&&!q[W]&&(q[W]=!0,f.inverted&&(a=e.len-a,b=h.len-b),A.push({clientX:a,plotX:a,plotY:b,i:M+c}))},d=aa(f,a);this.visible?((this.points||this.graph)&&this.destroyGraphics(),
z(f)?this.markerGroup=f.markerGroup:this.markerGroup=a.plotGroup("markerGroup","markers",!0,1,f.seriesGroup),A=this.points=[],a.buildKDTree=la,d&&(ca(d,this),d.pushSeries(a),ba(d,this,f)),S(u?a.data:g||p,function(a,c){var d,g,l,p="undefined"===typeof f.index,q=!0;if(!p&&(D?(d=a[0],g=a[1]):(d=a,g=n[c]),E?(D&&(g=a.slice(1,3)),l=g[0],g=g[1]):u&&(d=a.x,g=a.stackY,l=g-a.y),O||(q=g>=t&&g<=b),null!==g&&d>=w&&d<=k&&q))if(a=Math.ceil(e.toPixels(d,!0)),B){if(void 0===r||a===x){E||(l=g);if(void 0===v||g>G)G=
g,v=c;if(void 0===r||l<N)N=l,r=c}a!==x&&(void 0!==r&&(g=h.toPixels(G,!0),y=h.toPixels(N,!0),m(a,g,v),y!==g&&m(a,y,r)),r=v=void 0,x=a)}else g=Math.ceil(h.toPixels(g,!0)),m(a,g,c);return!p},function(){ma(a,"renderedCanvas");a.directTouch=!1;a.options.stickyTracking=!0;delete a.buildKDTree;a.buildKDTree()},f.renderer.forExport?Number.MAX_VALUE:void 0)):!z(f)&&d&&(d.clear(),this.image.attr({href:""}))}}),C(["heatmap","treemap"],function(a){g[a]&&(w(g[a].prototype,"drawPoints",ka),g[a].prototype.directTouch=
!1)}),g.bubble&&(delete g.bubble.prototype.buildKDTree,g.bubble.prototype.directTouch=!1,w(g.bubble.prototype,"markerAttribs",function(a){return A(this)?!1:a.apply(this,[].slice.call(arguments,1))})),g.scatter.prototype.fill=!0,da(g.area.prototype,{fill:!0,fillOpacity:!0,sampling:!0}),da(g.column.prototype,{fill:!0,sampling:!0}),w(p.prototype,"setVisible",function(a,c){a.call(this,c,!1);!1===this.visible&&this.ogl&&this.canvas&&this.image?(this.ogl.clear(),this.image.attr({href:""})):this.chart.redraw()}),
h.Chart.prototype.callbacks.push(function(a){ea(a,"predraw",function(){!z(a)&&a.didBoost&&(a.didBoost=!1,a.image&&a.image.attr({href:""}));a.canvas&&a.ogl&&z(a)&&(a.didBoost=!0,a.ogl.allocateBuffer(a));a.markerGroup&&a.xAxis&&0<a.xAxis.length&&a.yAxis&&0<a.yAxis.length&&a.markerGroup.translate(a.xAxis[0].pos,a.yAxis[0].pos)});ea(a,"render",function(){a.ogl&&z(a)&&a.ogl.render(a)})})):"undefined"!==typeof h.initCanvasBoost?h.initCanvasBoost():h.error(26)})(x)});

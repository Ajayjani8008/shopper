"use strict";(globalThis.webpackChunk_wcAdmin_webpackJsonp=globalThis.webpackChunk_wcAdmin_webpackJsonp||[]).push([[3994],{74457:(e,t,r)=>{r.d(t,{O3:()=>a,be:()=>n,u8:()=>c});var o=r(65736),s=r(92694);const a=(0,s.applyFilters)("woocommerce_admin_revenue_report_charts",[{key:"gross_sales",label:(0,o.__)("Gross sales","woocommerce"),order:"desc",orderby:"gross_sales",type:"currency",isReverseTrend:!1},{key:"refunds",label:(0,o.__)("Returns","woocommerce"),order:"desc",orderby:"refunds",type:"currency",isReverseTrend:!0},{key:"coupons",label:(0,o.__)("Coupons","woocommerce"),order:"desc",orderby:"coupons",type:"currency",isReverseTrend:!1},{key:"net_revenue",label:(0,o.__)("Net sales","woocommerce"),orderby:"net_revenue",type:"currency",isReverseTrend:!1,labelTooltipText:(0,o.__)("Full refunds are not deducted from tax or net sales totals","woocommerce")},{key:"taxes",label:(0,o.__)("Taxes","woocommerce"),order:"desc",orderby:"taxes",type:"currency",isReverseTrend:!1,labelTooltipText:(0,o.__)("Full refunds are not deducted from tax or net sales totals","woocommerce")},{key:"shipping",label:(0,o.__)("Shipping","woocommerce"),orderby:"shipping",type:"currency",isReverseTrend:!1},{key:"total_sales",label:(0,o.__)("Total sales","woocommerce"),order:"desc",orderby:"total_sales",type:"currency",isReverseTrend:!1}]),n=(0,s.applyFilters)("woocommerce_admin_revenue_report_advanced_filters",{filters:{},title:(0,o._x)("Revenue Matches <select/> Filters","A sentence describing filters for Revenue. See screen shot for context: https://cloudup.com/cSsUY9VeCVJ","woocommerce")}),l=[];Object.keys(n.filters).length&&(l.push({label:(0,o.__)("All Revenue","woocommerce"),value:"all"}),l.push({label:(0,o.__)("Advanced Filters","woocommerce"),value:"advanced"}));const c=(0,s.applyFilters)("woocommerce_admin_revenue_report_filters",[{label:(0,o.__)("Show","woocommerce"),staticParams:["chartType","paged","per_page"],param:"filter",showFilters:()=>l.length>0,filters:l}])},28056:(e,t,r)=>{r.r(t),r.d(t,{default:()=>q});var o=r(69307),s=r(7862),a=r.n(s),n=r(65736),l=r(74457),c=r(83573),i=r(47478),d=r(80272),m=r(69771),u=r(9818),p=r(94333),_=r(92819),y=r(86020),b=r(81595),g=r(67221),h=r(81921),w=r(67905),v=r(17844),f=r(42968),T=r(17062);const S=[],R=["orders_count","gross_sales","total_sales","refunds","coupons","taxes","shipping","net_revenue"];class k extends o.Component{constructor(){super(),this.getHeadersContent=this.getHeadersContent.bind(this),this.getRowsContent=this.getRowsContent.bind(this),this.getSummary=this.getSummary.bind(this)}getHeadersContent(){return[{label:(0,n.__)("Date","woocommerce"),key:"date",required:!0,defaultSort:!0,isLeftAligned:!0,isSortable:!0},{label:(0,n.__)("Orders","woocommerce"),key:"orders_count",required:!1,isSortable:!0,isNumeric:!0},{label:(0,n.__)("Gross sales","woocommerce"),key:"gross_sales",required:!1,isSortable:!0,isNumeric:!0},{label:(0,n.__)("Returns","woocommerce"),key:"refunds",required:!1,isSortable:!0,isNumeric:!0},{label:(0,n.__)("Coupons","woocommerce"),key:"coupons",required:!1,isSortable:!0,isNumeric:!0},{label:(0,n.__)("Net sales","woocommerce"),key:"net_revenue",required:!1,isSortable:!0,isNumeric:!0},{label:(0,n.__)("Taxes","woocommerce"),key:"taxes",required:!1,isSortable:!0,isNumeric:!0},{label:(0,n.__)("Shipping","woocommerce"),key:"shipping",required:!1,isSortable:!0,isNumeric:!0},{label:(0,n.__)("Total sales","woocommerce"),key:"total_sales",required:!1,isSortable:!0,isNumeric:!0}]}getRowsContent(e=[]){const t=(0,T.O3)("dateFormat",h.defaultTableDateFormat),{formatAmount:r,render:s,formatDecimal:a,getCurrencyConfig:n}=this.context;return e.map((e=>{const{coupons:l,gross_sales:c,total_sales:i,net_revenue:d,orders_count:u,refunds:p,shipping:_,taxes:g}=e.subtotals,h=(0,o.createElement)(y.Link,{href:`edit.php?post_type=shop_order&order_date_type=${this.props.dateType}&m=`+(0,m.format)("Ymd",e.date_start),type:"wp-admin"},(0,b.formatValue)(n(),"number",u));return[{display:(0,o.createElement)(y.Date,{date:e.date_start,visibleFormat:t}),value:e.date_start},{display:h,value:Number(u)},{display:s(c),value:a(c)},{display:r(p),value:a(p)},{display:r(l),value:a(l)},{display:s(d),value:a(d)},{display:s(g),value:a(g)},{display:s(_),value:a(_)},{display:s(i),value:a(i)}]}))}getSummary(e,t=0){const{orders_count:r=0,gross_sales:o=0,total_sales:s=0,refunds:a=0,coupons:l=0,taxes:c=0,shipping:i=0,net_revenue:d=0}=e,{formatAmount:m,getCurrencyConfig:u}=this.context,p=u();return[{label:(0,n._n)("day","days",t,"woocommerce"),value:(0,b.formatValue)(p,"number",t)},{label:(0,n._n)("order","orders",r,"woocommerce"),value:(0,b.formatValue)(p,"number",r)},{label:(0,n.__)("Gross sales","woocommerce"),value:m(o)},{label:(0,n.__)("Returns","woocommerce"),value:m(a)},{label:(0,n.__)("Coupons","woocommerce"),value:m(l)},{label:(0,n.__)("Net sales","woocommerce"),value:m(d)},{label:(0,n.__)("Taxes","woocommerce"),value:m(c)},{label:(0,n.__)("Shipping","woocommerce"),value:m(i)},{label:(0,n.__)("Total sales","woocommerce"),value:m(s)}]}render(){const{advancedFilters:e,filters:t,tableData:r,query:s}=this.props;return(0,o.createElement)(f.Z,{endpoint:"revenue",getHeadersContent:this.getHeadersContent,getRowsContent:this.getRowsContent,getSummary:this.getSummary,summaryFields:R,query:s,tableData:r,title:(0,n.__)("Revenue","woocommerce"),columnPrefsKey:"revenue_report_columns",filters:t,advancedFilters:e})}}k.contextType=v.CurrencyContext;const E=(0,_.memoize)(((e,t,r,o,s)=>({tableData:{items:{data:(0,_.get)(o,["data","intervals"],S),totalResults:(0,_.get)(o,["totalResults"],0)},isError:e,isRequesting:t,query:r},dateType:s})),((e,t,r,o,s)=>[e,t,(0,w.stringify)(r),(0,_.get)(o,["totalResults"],0),(0,_.get)(o,["data","intervals"],S).length,s].join(":"))),C=(0,_.memoize)(((e,t,r,o,s)=>({interval:"day",orderby:t,order:e,page:r,per_page:o,after:(0,h.appendTimestamp)(s.primary.after,"start"),before:(0,h.appendTimestamp)(s.primary.before,"end")})),((e,t,r,o,s)=>[e,t,r,o,s.primary.after,s.primary.before].join(":"))),O=(0,p.compose)((0,u.withSelect)(((e,t)=>{const{query:r,filters:o,advancedFilters:s}=t,{woocommerce_default_date_range:a}=e(g.SETTINGS_STORE_NAME).getSetting("wc_admin","wcAdminSettings"),{getOption:n}=e(g.OPTIONS_STORE_NAME),l=n("woocommerce_date_type")||"date_paid",c=(0,h.getCurrentDates)(r,a),{getReportStats:i,getReportStatsError:d,isResolving:m}=e(g.REPORTS_STORE_NAME),u=C(r.order||"desc",r.orderby||"date",r.paged||1,r.per_page||g.QUERY_DEFAULTS.pageSize,c),p=(0,g.getReportTableQuery)({endpoint:"revenue",query:r,select:e,tableQuery:u,filters:o,advancedFilters:s}),_=i("revenue",p),y=Boolean(d("revenue",p)),b=m("getReportStats",["revenue",p]);return E(y,b,u,_,l)})))(k);var x=r(31511),N=r(40116);class q extends o.Component{render(){const{path:e,query:t}=this.props;return(0,o.createElement)(o.Fragment,null,(0,o.createElement)(x.Z,{query:t,path:e,report:"revenue",filters:l.u8,advancedFilters:l.be}),(0,o.createElement)(d.Z,{charts:l.O3,endpoint:"revenue",query:t,selectedChart:(0,c.Z)(t.chart,l.O3),filters:l.u8,advancedFilters:l.be}),(0,o.createElement)(i.Z,{charts:l.O3,endpoint:"revenue",path:e,query:t,selectedChart:(0,c.Z)(t.chart,l.O3),filters:l.u8,advancedFilters:l.be}),(0,o.createElement)(O,{query:t,filters:l.u8,advancedFilters:l.be}),(0,o.createElement)(N.I,{optionName:"woocommerce_revenue_report_date_tour_shown",headingText:(0,n.__)("Revenue is now reported from paid orders ✅","woocommerce")}))}}q.propTypes={path:a().string.isRequired,query:a().object.isRequired}},40116:(e,t,r)=>{r.d(t,{I:()=>d});var o=r(86020),s=r(65736),a=r(67221),n=r(69307),l=r(9818),c=r(74617);const i="woocommerce_date_type",d=({optionName:e,headingText:t})=>{const[r,d]=(0,n.useState)(!1),{updateOptions:m}=(0,l.useDispatch)(a.OPTIONS_STORE_NAME),{shouldShowTour:u,isResolving:p}=(0,l.useSelect)((t=>{const{getOption:r,hasFinishedResolution:o}=t(a.OPTIONS_STORE_NAME);return{shouldShowTour:"yes"!==r(e)&&!1===r(i),isResolving:!(o("getOption",[e])&&o("getOption",[i]))}}));if(r||!u||p)return null;const _={steps:[{referenceElements:{desktop:".woocommerce-filters-filter > .components-dropdown"},focusElement:{desktop:".woocommerce-filters-filter > .components-dropdown"},meta:{name:"product-feedback-",heading:t,descriptions:{desktop:(0,n.createInterpolateElement)((0,s.__)("We now collect orders in this table based on when the payment went through, rather than when they were placed. You can change this in <link>settings</link>.","woocommerce"),{link:(0,n.createElement)("a",{href:(0,c.getAdminLink)("admin.php?page=wc-admin&path=/analytics/settings"),"aria-label":(0,s.__)("Analytics date settings","woocommerce")})})},primaryButton:{text:(0,s.__)("Got it","woocommerce")}},options:{classNames:{desktop:"woocommerce-revenue-report-date-tour"}}}],closeHandler:()=>{m({[e]:"yes"}),d(!0)}};return(0,n.createElement)(o.TourKit,{config:_})}}}]);
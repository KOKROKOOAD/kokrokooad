 export const routes = [{
         path: '/user-account/subscription-create',
         name: 'selectMedia',
         component: require('../components/create-subscriptions/createAd'),
     },
     {
         name: 'fileupload',
         path: '/user-account/create-sub-file',
         component: require('../components/file-uploads/fileUpload')
     },
     {
         name: 'selectMediaHouse',
         path: '/user-account/create-sub-media-house',
         component: require('../components/diplay-media-house/displayMediaHouseImags')
     },
     {
         name: 'selectRateCard',
         path: '/user-account/create-sub-rate-card',
         component: require('../components/fetch-ratecards/selectRateCard')
     },
     {
         name: 'segments',
         path: '/user-account/create-sub-date',
         component: require('../components/fetch-ratecards/rateCardSegments')
     },
     {
         name: 'invoice',
         path: '/user-account/create-sub-invoice',
         component: require('../components/creation_of_sub_summary/adSummary')
     },
     {
         name: 'subs',
         path: '/user-account/subscriptions',
         component: require('../components/subscriptions/subscriptions')
     },
     {
         name: 'update-subs',
         path: '/user-account/update-subs',
         component: require('../components/subscriptions/updateSubs')
     },
     {
         name: 'selectSegments',
         path: '/user-account/select-segment',
         component: require('../components/test-components/selectSegments.vue')
     },
     {
         name: 'selectRateAndTime',
         path: '/user-account/select-rate',
         component: require('../components/display-selected-rate/selectRateAndTime')
     },
     {
         name: 'fullcalender',
         path: '/user-account/select-calender',
         component: require('../components/fullcalender/fullcalender')
     },
     {
         name: 'payment',
         path: '/user-account/payment',
         component: require('../components/payment/paymentType')
     },
     {
         name: 'complete-payment',
         path: '/user-account/payment',
         component: require('../components/payment/completePayment')
     },
     {
         name: 'view-mediahouses',
         path: '/user-account/media-houses',
         component: require('../components/view-ratecars/selectMediaHouse')
     },
     {
         name: 'view-ratecards',
         path: '/user-account/view-ratecards',
         component: require('../components/view-ratecars/viewRateCards')
     },
     {
         name: 'select-mtype',
         path: '/user-account/select-media',
         component: require('../components/view-ratecars/selectMediaType')
     },

     {
         name: 'transactions',
         path: '/user-account/transactions',
         component: require('../components/transactions/transactions')
     },
     {
         name: 'cart',
         path: '/user-account/cart',
         component: require('../components/cart/cart')
     },
     {
         name: 'profile',
         path: '/user-account/user-profile',
         component: require('../components/userProfile/userProfile')
     },
     {
         name: 'home',
         path: '/user-account/dashboard',
         component: require('../components/test-components/home')
     },
     {
         name: 'payment-success',
         path: '/user-account/payment-success',
         component: require('../components/success-pages/success')
     },
     {
         name: 'password',
         path: '/user-account/change-password',
         component: require('../components/userProfile/change_password')
     },
     {
         name: 'view-client-file',
         path: '/user-account/viewClientFile?sub_id=:id',
         component: require('../components/subscriptions/viewFile'),
         props: true
     }


 ];

 /* export const routes = [{
         path: '/user-account/create-subscription-media',
         name: 'selectMedia',
         component: require('../components/create-subscriptions/createAd'),
     },
     {
         name: 'fileupload',
         path: '/user-account/create-sub-file',
         component: require('../components/file-uploads/fileUpload')
     },
     {
         name: 'selectMediaHouse',
         path: '/user-account/create-sub-media-house',
         component: require('../components/diplay-media-house/displayMediaHouseImags')
     },
     {
         name: 'selectRateCard',
         path: '/user-account/create-sub-rate-card',
         component: require('../components/fetch-ratecards/selectRateCard')
     },
     {
         name: 'segments',
         path: '/user-account/create-sub-date',
         component: require('../components/fetch-ratecards/rateCardSegments')
     },
     {
         name: 'invoice',
         path: '/user-account/create-sub-invoice',
         component: require('../components/creation_of_sub_summary/adSummary')
     },
     {
         name: 'subs',
         path: '/user-account/subscriptions',
         component: require('../components/subscriptions/subscriptions')
     },
     // {   name : 'selectSegments',
     //     path : '/kokrokoo.com/user-account/select-segment',
     //     component : require('../components/subscriptions/selectSegments.vue')
     // },
     {
         name: 'selectRateAndTime',
         path: '/kokrokoo.com/user-account/select-rate',
         component: require('../components/display-selected-rate/selectRateAndTime')
     },
     {
         name: 'fullcalender',
         path: '/user-account/select-calender',
         component: require('../components/fullcalender/fullcalender')
     },
     {
         name: 'payment',
         path: '/user-account/payment',
         component: require('../components/payment/paymentType')
     },
     {
         name: 'transactions',
         path: '/user-account/transactions',
         component: require('../components/transactions/transactions')
     },
     {
         name: 'profile',
         path: '/user-account/user-profile',
         component: require('../components/userProfile/userProfile')
     },
     // {   name : 'home',
     //     path : '/kokrokoo.com/user-account/dashboard',
     //     component : require('../components/subscriptions/home')
     // },
     {
         name: 'payment-success',
         path: '/kokrokoo.com/user-account/payment-success',
         component: require('../components/success-pages/success')
     },


 ]; */
 export const routes = [{
         path: '/user-account/create-subscription-media',
         name: 'selectMedia',
         component: require('../components/create-subscriptions/createAd'),
     },
     {
         name: 'fileupload',
         path: '/user-account/user-account/create-sub-file',
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
         name: 'transactions',
         path: '/user-account/transactions',
         component: require('../components/transactions/transactions')
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


 ];

 /* export const routes = [{
         path: '/kokrokoo.com/user-account/create-subscription-media',
         name: 'selectMedia',
         component: require('../components/create-subscriptions/createAd'),
     },
     {
         name: 'fileupload',
         path: '/kokrokoo.com/user-account/create-sub-file',
         component: require('../components/file-uploads/fileUpload')
     },
     {
         name: 'selectMediaHouse',
         path: '/kokrokoo.com/user-account/create-sub-media-house',
         component: require('../components/diplay-media-house/displayMediaHouseImags')
     },
     {
         name: 'selectRateCard',
         path: '/kokrokoo.com/user-account/create-sub-rate-card',
         component: require('../components/fetch-ratecards/selectRateCard')
     },
     {
         name: 'segments',
         path: '/kokrokoo.com/user-account/create-sub-date',
         component: require('../components/fetch-ratecards/rateCardSegments')
     },
     {
         name: 'invoice',
         path: '/kokrokoo.com/user-account/create-sub-invoice',
         component: require('../components/creation_of_sub_summary/adSummary')
     },
     {
         name: 'subs',
         path: '/kokrokoo.com/user-account/subscriptions',
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
         path: '/kokrokoo.com/user-account/select-calender',
         component: require('../components/fullcalender/fullcalender')
     },
     {
         name: 'payment',
         path: '/kokrokoo.com/user-account/payment',
         component: require('../components/payment/paymentType')
     },
     {
         name: 'transactions',
         path: '/kokrokoo.com/user-account/transactions',
         component: require('../components/transactions/transactions')
     },
     {
         name: 'profile',
         path: '/kokrokoo.com/user-account/user-profile',
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
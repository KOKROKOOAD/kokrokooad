
  export const routes = [
<<<<<<< HEAD
<<<<<<< HEAD
        {
            path: '/kokrokoo.com/user-account/create-subscription-media',
=======
        {
            path: '/kokrokoo.com/create-subscription-media',
>>>>>>> f3d474cb722eba3467f2fb8e58f37c32ed53d510
            name : 'selectMedia',
            component : require('../components/subscriptions/createAd'),
        },
        {   name : 'fileupload',
            path : '/kokrokoo.com/user-account/create-sub-file',
            component : require('../components/subscriptions/fileUpload')
        },
<<<<<<< HEAD
=======
      {
          path: '/user-account/create-subscription-media',
          name : 'selectMedia',
          component : require('../components/subscriptions/createAd'),
      },
      {   name : 'fileupload',
          path : '/user-account/create-sub-file',
          component : require('../components/subscriptions/fileUpload')
      },
>>>>>>> 2670a1019f6c1570c8849971322f309581228993
=======
>>>>>>> f3d474cb722eba3467f2fb8e58f37c32ed53d510
      {   name : 'selectMediaHouse',
          path : '/kokrokoo.com/user-account/create-sub-media-house',
          component : require('../components/subscriptions/displayMediaHouseImags')
      },
      {   name : 'selectRateCard',
          path : '/kokrokoo.com/user-account/create-sub-rate-card',
          component : require('../components/subscriptions/selectRateCard')
      },
      {
          name : 'segments',
<<<<<<< HEAD
<<<<<<< HEAD
      path : '/kokrokoo.com/user-account/create-sub-date',
      component : require('../components/subscriptions/rateCardSegments')
  },
=======
          path : '/user-account/create-sub-date',
          component : require('../components/subscriptions/rateCardSegments')
      },
>>>>>>> 2670a1019f6c1570c8849971322f309581228993
=======
      path : '/kokrokoo.com/user-account/create-sub-date',
      component : require('../components/subscriptions/rateCardSegments')
  },
>>>>>>> f3d474cb722eba3467f2fb8e58f37c32ed53d510
      {   name : 'invoice',
          path : '/kokrokoo.com/user-account/create-sub-invoice',
          component : require('../components/subscriptions/adSummary')
      },
      {   name : 'subs',
          path : '/kokrokoo.com/user-account/subscriptions',
          component : require('../components/subscriptions/subscriptions')
      },
      {   name : 'selectSegments',
          path : '/kokrokoo.com/user-account/select-segment',
          component : require('../components/subscriptions/selectSegments.vue')
      },
      {   name : 'selectRateAndTime',
          path : '/kokrokoo.com/user-account/select-rate',
          component : require('../components/subscriptions/selectRateAndTime')
      },
      {   name : 'fullcalender',
          path : '/kokrokoo.com/user-account/select-calender',
          component : require('../components/subscriptions/fullcalender')
      },
      {   name : 'payment',
          path : '/kokrokoo.com/user-account/payment',
          component : require('../components/payment/paymentType')
      },
      {   name : 'transactions',
          path : '/kokrokoo.com/user-account/transactions',
          component : require('../components/subscriptions/transactions')
      },
      {   name : 'profile',
          path : '/kokrokoo.com/user-account/user-profile',
          component : require('../components/userProfile/userProfile')
      },
      {   name : 'home',
          path : '/kokrokoo.com/user-account/dashboard',
          component : require('../components/subscriptions/home')
      },
      {   name : 'payment-success',
          path : '/kokrokoo.com/user-account/payment-success',
          component : require('../components/success-pages/success')
      },


  ];


  // export const routes = [
  //     {
  //         path: '/user-account/create-subscription-media',
  //         name : 'selectMedia',
  //         component : require('../components/subscriptions/createAd'),
  //     },
  //     {   name : 'fileupload',
  //         path : '/user-account/create-sub-file',
  //         component : require('../components/subscriptions/fileUpload')
  //     },
  //     {   name : 'selectMediaHouse',
  //         path : '/user-account/create-sub-media-house',
  //         component : require('../components/subscriptions/displayMediaHouseImags')
  //     },
  //     {   name : 'selectRateCard',
  //         path : '/user-account/create-sub-rate-card',
  //         component : require('../components/subscriptions/selectRateCard')
  //     },
  //     {
  //         name : 'segments',
  //         path : '/user-account/create-sub-date',
  //         component : require('../components/subscriptions/rateCardSegments')
  //     },
  //     {   name : 'invoice',
  //         path : '/user-account/create-sub-invoice',
  //         component : require('../components/subscriptions/adSummary')
  //     },
  //     {   name : 'subs',
  //         path : '/user-account/subscriptions',
  //         component : require('../components/subscriptions/subscriptions')
  //     },
  //     {   name : 'selectSegments',
  //         path : '/user-account/select-segment',
  //         component : require('../components/subscriptions/selectSegments.vue')
  //     },
  //     {   name : 'selectRateAndTime',
  //         path : '/user-account/select-rate',
  //         component : require('../components/subscriptions/selectRateAndTime')
  //     },
  //     {   name : 'fullcalender',
  //         path : '/user-account/select-calender',
  //         component : require('../components/subscriptions/fullcalender')
  //     },
  //     {   name : 'payment',
  //         path : '/user-account/payment',
  //         component : require('../components/payment/paymentType')
  //     },
  //     {   name : 'transactions',
  //         path : '/user-account/transactions',
  //         component : require('../components/subscriptions/transactions')
  //     },
  //     {   name : 'profile',
  //         path : '/user-account/user-profile',
  //         component : require('../components/userProfile/userProfile')
  //     },
  //     {   name : 'home',
  //         path : '/user-account/dashboard',
  //         component : require('../components/subscriptions/home')
  //     },
  //     {   name : 'payment-success',
  //         path : '/user-account/payment-success',
  //         component : require('../components/success-pages/success')
  //     },
  // ];
  //
  //
  //


  export const routes = [
        {
            path: '/user-account/create-subscription-media',
            name : 'selectMedia',
            component : require('../components/subscriptions/createAd'),
        },
        {   name : 'fileupload',
            path : '/user-account/create-sub-file',
            component : require('../components/subscriptions/fileUpload')
        },
      {   name : 'selectMediaHouse',
          path : '/user-account/create-sub-media-house',
          component : require('../components/subscriptions/displayMediaHouseImags')
      },
      {   name : 'selectRateCard',
          path : '/user-account/create-sub-rate-card',
          component : require('../components/subscriptions/selectRateCard')
      },
      {
          name : 'segments',
      path : '/user-account/create-sub-date',
      component : require('../components/subscriptions/rateCardSegments')
  },
      {   name : 'invoice',
          path : '/user-account/create-sub-invoice',
          component : require('../components/subscriptions/adSummary')
      },
      {   name : 'subs',
          path : '/user-account/subscriptions',
          component : require('../components/subscriptions/subscriptions')
      },
      {   name : 'selectSegments',
          path : '/user-account/select-segment',
          component : require('../components/subscriptions/selectSegments.vue')
      },
      {   name : 'selectRateAndTime',
          path : '/user-account/select-rate',
          component : require('../components/subscriptions/selectRateAndTime')
      },
      {   name : 'fullcalender',
          path : '/user-account/select-calender',
          component : require('../components/subscriptions/fullcalender')
      },
      {   name : 'payment',
          path : '/user-account/payment',
          component : require('../components/payment/paymentType')
      },
      {   name : 'transactions',
          path : '/user-account/transactions',
          component : require('../components/subscriptions/transactions')
      },
      {   name : 'profile',
          path : '/user-account/user-profile',
          component : require('../components/userProfile/userProfile')
      },
      {   name : 'home',
          path : '/user-account/dashboard',
          component : require('../components/subscriptions/home')
      },
      {   name : 'payment-success',
          path : '/user-account/payment-success',
          component : require('../components/success-pages/success')
      },







  ];


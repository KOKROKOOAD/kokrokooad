
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
          component : require('../components/subscriptions/subs')
      },
      {   name : 'selectSegments',
          path : '/user-account/subscriptions/select-segment',
          component : require('../components/subscriptions/selectSegment.vue')
      },


  ];


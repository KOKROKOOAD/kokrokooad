import  Vue from 'vue';
import  Vuex from 'vuex';
import axios from "axios";

Vue.use(Vuex);
Vue.config.debug = true;

const debug = process.env.NODE_ENV !== 'production';

 export default  new Vuex.Store({
   state: {
        selMedia: '',
        segment_titles: [],
        media: '',
        showSelMediaHouseTable: false,
        create_ad_data: '',
        wizard: true,
        show_sched: false,
        mon_segments: [],
        schedule_ad_data: [],
        selMediaId: '',
        file: '',
        fileName: '',
        showPayment: false,
        processing: false,
        showMediaForm: false,
        media_houses: [],
        fadeIn: '',
        notify: '',
       segment_data :{
            selSegmentDay : '',
           rate_card_title : '',
       },
       selMediaHouse : '',
       seg_date : '',
       selSegment : '',
       segment_title : ''

    },


     mutations:{
        //===============set values for states==============
         setSelectedMedia(state, payload){
             state.selMedia = payload;
         },
         setSegment_titles(state, payload){
             state.segment_titles = payload;
         },
         setShowSelMediaHouseTable(state, payload){
             state.showSelMediaHouseTable = payload;
         },
         setCreateAdData(state, payload){
             state.create_ad_data = payload;
         },
         setSelMediaType(state,payload){
             state.media  = payload;
         },
         setWizard(state,payload){
             state.wizard = payload;
         },
         setShowSched(state,payload){
             state.show_sched = payload;
         },
         setMonSegments(state,payload){
             state.mon_segments = payload;
         },
         setScheduledAd(state,payload){
             state.schedule_ad_data = payload;
         },
         setSelMediaId(state,payload){
             state.selMediaId = payload;
         },
         setFileName(state,payload){
             state.file = payload;
         },
         setUploadFileName(state,payload){
             state.fileName = payload;
         },
         setShowPayment(state,payload){
             state.showPayment = payload;
         },
         setProcessing(state, payload){
             state.processing = payload;
         },
         setShowMediaForm(state,payload){
             state.showMediaForm = payload;
         },
         setMediaHouses(state,payload){
             state.media_houses = payload;
         },
         setFadeIn(state, payload){
             state.fadeIn = payload;
         },
         setAvailableDate(state,payload){
             state.notify = payload;
         },
         setSelSegmentDay(state,payload){
             state.segment_data.selSegmentDay = payload;
         },
         setRateCardTitle(state, payload){
             state.segment_data.rate_card_title = payload;
         },
         setSelMediaHouse(state,payload){
             state.selMediaHouse = payload;
         },
         setSegmentDate(state, payload){
             state.seg_date = payload;
         },
         setSelSegment(state, payload){
             state.selSegment = payload;
         },
         setSegmentTitle(state,payload){
             state.segment_title = payload;
         }


     },
     actions:{
        getShowSched(context,status){
            context.commit('setShowSched', status);
        },
        getWizard(context,wiz){
            context.commit('setWizard',wiz);
        },
        getSelectedMedia(context,mediaHouse){
            context.commit('setSelectedMedia', mediaHouse);
        },

         //fetch segment titles eg:LPMs for selected media house
         fetchSegmentTitles(context, mediaHouse){

           return axios.get('fetch-segments-titles/' + mediaHouse).then(function(res){
                 context.commit('setSegment_titles',res.data);
               //  context.commit('getSelMediaId',res.data[1].client_id);

               //self.showSelMediaHouseTable = true;
             });
         },

         changeStateShowSelMediaHouseTable(context, status){
             context.commit('setShowSelMediaHouseTable', status);
         },
         getCreatedAdData(context, data){
             context.commit('setCreateAdData', data);
         },
         getSelMediaType(context,data){
             context.commit('setSelMediaType', data);
         },
         getMonSegments(context,payload){
             context.commit('setMonSegments', payload);
         },
         getScheduleAd(context,payload){
             context.commit('setScheduledAd', payload);
         },
         getSelMediaId(context,payload){
             context.commit('setSelMediaId', payload);
         },
         getFileName(context,payload){
             context.commit('setFileName', payload);
         },
         getUploadFileName(context,payload) {
             context.commit('setUploadFileName', payload);
         },
         getShowPayment(context,payload){
             context.commit('setShowPayment', payload);
         },
         getProcessing(context,payload){
             context.commit('setProcessing',payload);
         },
         getShowMediaForm(context,payload){
             context.commit('setShowMediaForm', payload);
         },
         getMediaHouses(context,payload){
             context.commit('setMediaHouses', payload)
         },
         getFadeIn(context, payload){
             context.commit('setFadeIn', payload);
         },
         getAvailableDate(context, payload){
             context.commit('setAvailableDate',payload);
         },
         getSelSegmentDay(context, payload){
             context.commit('setSelSegmentDay',payload);
         },
         getRateCardTitle(context, payload){
             context.commit('setRateCardTitle', payload);
         },
         getSelMediaHouse(context, payload){
             context.commit('setSelMediaHouse', payload);
         },
         getSegmentDate(context, payload){
             context.commit('setSegmentDate', payload);
         },
         getSelSegment(context, payload){
             context.commit('setSelSegment', payload);
         },
         getSegmentTitle(context, payload){
            context.commit('setSegmentTitle', payload);
         }
     },
     getters:{
          getMediaFormStatus(state){
             return state.showMediaForm;
          },
         mediaHouses(state){
              return state.media_houses;
         },
         fadeInn(state){
             return state.fadeIn;
         },
         selectedMediaHouse(state){
             return state.media_houses;
         },
         checkAvailableDate(state){
             return state.notify;
         },
         segmentDay(state){
             return state.segment_data.selSegmentDay;
         },
         segmentTitle(state){
             return state.segment_data.rate_card_title;
         },
         segmentsData(state){
             let data = [state.media,state.selMedia,state.fileName,state.segment_data];
             return data;
         },
         segmentDate(state){
             return state.seg_date;
         },
         selectedSegment(state){
             return state.selSegment;
         },
         segTitle(state){
              return state.segment_title;
         }



     },
 });
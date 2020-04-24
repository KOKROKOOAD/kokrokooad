<template>
  <div class="row mt-2">
    <div class="col-md-8">
      Page: {{subs.current_page}} - {{subs.to}}
      Total: {{subs.total}}
    </div>
    <div class="col-md-4">
      <nav>
        <ul class="pagination float-right" v-if="subs.last_page > 1">
          <li :class="[ ((subs.current_page == 1) ? 'disabled' : '') ]">
            <a
              :href="'?page='+subs.current_page"
              @click.prevent="pageClicked(subs.current_page-1)"
              aria-label="Previous"
              v-if="subs.current_page != 1"
            >
              <span aria-hidden="true">«</span>
            </a>
            <a v-else>
              <span aria-hidden="true">«</span>
            </a>
          </li>
          <li
            v-for="pageNo in range(paginateLoop, numberOfPage)"
            :class="[ ((subs.current_page == pageNo) ? 'active' : '') ]"
          >
            <a :href="'?page='+pageNo" @click.prevent="pageClicked(pageNo)">{{ pageNo }}</a>
          </li>
          <li :class="[ ((subs.current_page == subs.last_page) ? 'disabled' : '') ]">
            <a
              :href="'?page='+subs.current_page"
              @click.prevent="pageClicked(subs.current_page+1)"
              aria-label="Next"
              v-if="subs.current_page != subs.last_page"
            >
              <span aria-hidden="true">»</span>
            </a>
            <a v-else>
              <span aria-hidden="true">»</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    subs: {
      required: true
      //   type: Object
    },
    midSize: {
      required: false,
      type: Number,
      default: 5
    }
  },
  data() {
    return {};
  },
  methods: {
    range(start, count) {
      return Array.apply(0, Array(count)).map(function(element, index) {
        return index + start;
      });
    },
    pageClicked(pageNo) {
      this.$emit("clicked", pageNo);
    }
  },
  computed: {
    paginateLoop() {
      let results = this.subs;
      if (results.last_page > this.midSize) {
        if (
          results.last_page - (this.midSize - 1) / 2 <=
          results.current_page
        ) {
          return results.last_page - (this.midSize - 1);
        }
        if (results.current_page > (this.midSize - 1) / 2 + 1) {
          return results.current_page - (this.midSize - 1) / 2;
        }
      }
      return 1;
    },
    numberOfPage() {
      let results = this.subs;
      if (results.last_page < this.midSize) {
        return results.last_page;
      } else {
        return this.midSize;
      }
    }
  }
};
</script>
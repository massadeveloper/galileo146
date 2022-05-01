<script>
import Paginator from "./Paginator.vue";
import collection from "../mixins/collection";

export default {
  components: { Paginator },

  mixins: [collection],

  data() {
    return { dataSet: false, items: [] };
  },

  created() {
    this.fetch();
  },

  methods: {
    fetch(page) {
      axios.get(this.url(page)).then(this.refresh);
    },

    url(page) {
      if (!page) {
        let query = location.search.match(/page=(\d+)/);

        page = query ? query[1] : 1;
      }

      return `/applications?page=${page}`;
    },

    refresh({ data }) {
      this.dataSet = data;
      this.items = data.data;

      window.scrollTo(0, 0);
    },
    accept(item) {
         axios.get('/accept/'+item.id ).then(response=>{
                this.items = response.data
                window.location.href = '/home';
            }).catch(error=>{
                console.log(error)
                this.categories = []
            })
      
    },
    refuse(item) {
          axios.get('/refuse/'+item.id ).then(response=>{
                this.items = response.data
                window.location.href = '/home';
            }).catch(error=>{
                console.log(error)
                this.categories = []
            })
    },
  },
};
</script>

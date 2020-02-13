const app = new Vue({
    el: '#app',
    data: {
        selected_state: '',
        selected_city: '',
        cities: [],
    },
    mounted() {
        document.getElementById("city").disabled=true;

        this.selected_state = this.getOldData('state');
        if (this.selected_state != '') {
            this.loadCities();
        }

        this.selected_city = this.getOldData('city');
    },
    methods: {
        loadCities() {
            this.selected_city = '';
            document.getElementById("city").disabled=true;

            if (this.selected_state != '') {
                axios.get('cities', {params: {state_id: this.selected_state} }).then((response) => {
                    this.cities = response.data;
                    document.getElementById("city").disabled=false;
                });
            }
        },
        getOldData(type) {
            return document.getElementById(type).getAttribute('data-old');
        }
    }
});


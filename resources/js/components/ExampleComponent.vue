<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Laravel Vue Dependent Dropdown Example - ItSolutionStuff.com</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label>Select State:</label>
                            <select class='form-control' v-model='state' @change='getCities()'>
                                <option value='0' >Select Country</option>
                                <option v-for='data in states' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Select City:</label>
                            <select class='form-control' v-model='city'>
                                <option value='0' >Select City</option>
                                <option v-for='data in cities' :value='data.id'>{{ data.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                state: 0,
                states: [],
                city: 0,
                cities: []

            }
        },
        methods:{
            getStates: function(){
                axios.get('/getStates')
                    .then(function (response) {
                        this.states = response.data;
                    }.bind(this));

            },
            getCities: function() {
                axios.get('/getCities',{
                    params: {
                        state_id: this.state
                    }
                }).then(function(response){
                    this.cities = response.data;
                }.bind(this));
            }
        },
        created: function(){
            this.getCities()
        }
    }
</script>

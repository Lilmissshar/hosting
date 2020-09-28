<template>
	<div class="container form-group has-label">
		<label>Destinations available
			<star class="star">*</star>
			<div class="btn btn-primary" v-on:click="addDestination()">Add More</div>

			<div class="row" v-for="(destination, index) in destinations">
		      <div class="col-10 pl-3">
		        <input type="text" class="form-control px-4" name="destinations" id="destinations" v-on:keyup="viewDestination(index)" v-model="destination.name" autocomplete="off" required>
		        <input type="hidden" name="destination_id[]" v-model="destination.id">
		        <ul v-if="destination.showList" class="team-search-display pl-0">
		          <li v-for="list in lists" v-on:click="destinationOption(list, index)" class="border-bottom-gray px-2 mt-2 text-left">
		            {{ list.name }}
		          </li>
		        </ul>
		      </div>

		      <div class="col-2">
		        <div class="btn btn-info d-inline-block ml-3" v-on:click="deleteDestination(index)">Remove</div>
		      </div>
		    </div>
	 	</label>
	</div>
</template>

<script>
	export default {
		props: ['propDestinations'],
		data: function() {
			return {
				destinations: [{
					"id": null,
					"name": null,
					"showList": false
				}],
				lists: [],
				clickedData: []
			};
		},
		mounted() {
			if(!this.propDestinations) {
				return;
			}

			this.destinations = JSON.parse(this.propDestinations);
		},
		methods: {
			addDestination: function() {
				console.log("addDestination")
				this.destinations.push({
					"id": null,
					"name": null,
					"showList": false
				})
			},
			deleteDestination: function(index) {
				console.log("delteService")
				this.destinations.splice(index, 1); 
			},
			viewDestination: function(index) {
				console.log("viewDestination")
				axios.get('/admin/destinations?' + 'ids=' + JSON.stringify(this.clickedData)) //from array(clickedData) into string
				.then(({ data }) => {
					this.lists = data.rows;
					this.destinations[index].showList = true;
				}) 
			},
			destinationOption: function(list, index) {
				console.log("ServiceOption")
				this.destinations[index].id = list.id;
				this.destinations[index].name = list.name;
				this.clickedData.push(list.id);
				this.destinations[index].showList = false;	
			}//pass in the service as a prop, then check the default function if u have the prop have any value. if not then create, otherwise its edit
		}	
	}
</script>
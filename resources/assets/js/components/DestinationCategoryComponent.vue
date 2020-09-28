<template>
	<div class="container form-group has-label">
		<label>Categories available
			<star class="star">*</star>
			<div class="btn btn-primary" v-on:click="addCategory()">Add More</div>

			<div class="row" v-for="(category, index) in categories">
		      <div class="col-10 pl-3">
		        <input type="text" class="form-control px-4" name="categories" id="categories" v-on:keyup="viewCategory(index)" v-model="category.name" autocomplete="off" required>
		        <input type="hidden" name="category_id[]" v-model="category.id">
		        <ul v-if="category.showList" class="team-search-display pl-0">
		          <li v-for="list in lists" v-on:click="categoryOption(list, index)" class="border-bottom-gray px-2 mt-2 text-left">
		            {{ list.name }}
		          </li>
		        </ul>
		      </div>

		      <div class="col-2">
		        <div class="btn btn-info d-inline-block ml-3" v-on:click="deleteCategory(index)">Remove</div>
		      </div>
		    </div>
	 	</label>
	</div>
</template>

<script>
	export default {
		props: ['propCategories'],
		data: function() {
			return {
				categories: [{
					"id": null,
					"name": null,
					"showList": false
				}],
				lists: [],
				clickedData: []
			};
		},
		mounted() {
			if(!this.propCategories) {
				return;
			}

			this.categories = JSON.parse(this.propCategories);
		},
		methods: {
			addCategory: function() {
				console.log("addCategory")
				this.categories.push({
					"id": null,
					"name": null,
					"showList": false
				})
			},
			deleteCategory: function(index) {
				console.log("delteService")
				this.categories.splice(index, 1); 
			},
			viewCategory: function(index) {
				console.log("viewService")
				axios.get('/admin/categories?' + 'ids=' + JSON.stringify(this.clickedData)) //from array(clickedData) into string
				.then(({ data }) => {
					this.lists = data.rows;
					this.categories[index].showList = true;
				}) 
			},
			categoryOption: function(list, index) {
				console.log("ServiceOption")
				this.categories[index].id = list.id;
				this.categories[index].name = list.name;
				this.clickedData.push(list.id);
				this.categories[index].showList = false;	
			}//pass in the service as a prop, then check the default function if u have the prop have any value. if not then create, otherwise its edit
		}	
	}
</script>
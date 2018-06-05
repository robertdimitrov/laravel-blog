(function(){
	let deleteFormCls = 'delete-post'

	let deletePostForm = document.getElementsByClassName(deleteFormCls)[0]

	if (deletePostForm) {
		deletePostForm.addEventListener('submit', (event) => {
			if (!confirm('Are you sure you want to delete this post?')) {
				event.preventDefault()
			}
		})
	}
})()
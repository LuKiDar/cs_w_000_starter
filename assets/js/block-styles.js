wp.domReady(()=>{
	// Unregister button styles
	wp.blocks.unregisterBlockStyle('core/button', 'outline');

	// Register button styles
	// const buttons_styles = [
	// 	{
	// 		name: 'fill-white',
	// 		label: 'Fill white',
	// 	}
	// ];
	// buttons_styles.forEach((item)=>{
	// 	wp.blocks.registerBlockStyle(
	// 		'core/button', {
	// 			name: item.name,
	// 			label: item.label,
	// 		}
	// 	);
	// });

	// Register separator styles
	// const separator_styles = [
	// 	{
	// 		name: 'tiles',
	// 		label: 'Blue tiles',
	// 	}
	// ];
	// separator_styles.forEach((item)=>{
	// 	wp.blocks.registerBlockStyle(
	// 		'core/separator', {
	// 			name: item.name,
	// 			label: item.label,
	// 		}
	// 	);
	// });
});
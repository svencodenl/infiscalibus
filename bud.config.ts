import type { Bud } from "@roots/bud";

/**
 * Bud config
 */
export default async (bud: Bud) => {
	bud
		.proxy(`http://infiscalibus.test:8888`)
		.serve(`http://localhost:4000`)
		.watch([bud.path(`resources/views`), bud.path(`app`)])

		.entry(`app`, [`@scripts/app`, `@styles/app`])
		.entry(`editor`, [`@scripts/editor`, `@styles/editor`])
		.copyDir(`images`)

		.setPublicPath(`/dist/`)
		.experiments(`topLevelAwait`, true)

		.splitChunks()
		.use(['@roots/bud-swc'])

		.wpjson.setSettings({
			color: {
				custom: false,
				customDuotone: false,
				customGradient: false,
				defaultDuotone: false,
				defaultGradients: false,
				defaultPalette: false,
				duotone: [],
				text: true,
				background: true,
			},
			custom: {
				spacing: {},
				typography: {
					"font-size": {},
					"line-height": {},
				},
			},
			layout: {
				contentSize: `64rem`,
			},
			spacing: {
				padding: true,
				units: [`px`, `%`, `em`, `rem`, `vw`, `vh`],
			},
			typography: {
				customFontSize: false,
				dropCap: undefined,
			},
		})
		.setStyles({
			spacing: {
				blockGap: `1.5rem`,
				padding: {
					left: `1.5rem`,
					right: `1.5rem`,
				},
			},
			// typography: {
			// 	fontFamily: `var(--wp--preset--font-family--sans)`,
			// 	fontSize: `var(--wp--preset--font-size--normal)`,
			// },
		})
		.setPath(bud.path(`public/dist/theme.json`));

	await bud.tapAsync(sourceThemeValues);

	bud
		.when(`eslint` in bud, ({ eslint }) =>
			eslint
				.extends([
					`@roots/eslint-config/sage`,
					`@roots/eslint-config/typescript`,
					`plugin:react/jsx-runtime`,
				])
				.setFix(false)
				.setFailOnWarning(bud.isProduction),
		)

		/**
		 * Stylelint config
		 */
		.when(`stylelint` in bud, ({ stylelint }) =>
			stylelint
				.extends([`@roots/bud-sass/config/stylelint`])
				.setFix(false)
				.setFailOnWarning(bud.isProduction),
		);

		// Handle dynamic imports
		bud.hooks.on('build.module.rules', (rules) => [
			...rules,
			{
				test: /\.js$/,
				exclude: /node_modules/,
				loader: 'swc-loader',
			},
		]);

		// Disable lazy loading
		// bud.hooks.on('dev.middleware.enabled', (middleware) => ({
		// 	...middleware,
		// 	lazyCompilation: false,
		// }));
};

/**
 * Find all `*.theme.js` files and apply them to the `theme.json` output
 */
const sourceThemeValues = async ({ error, glob, wpjson }: Bud) => {
	const importMatching = async (paths: Array<string>) =>
		await Promise.all(paths.map(async (path) => (await import(path)).default));

	const setThemeValues = (records: Record<string, unknown>) =>
		Object.entries(records).map((params) => wpjson.set(...params));

	await glob(`resources/**/*.theme.js`)
		.then(importMatching)
		.then((modules) => modules.map(setThemeValues))
		.catch(error);
};

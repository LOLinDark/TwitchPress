# TwitchPress Ecosystem Refactor & Standards Alignment Plan

## 1. Namespaces & Autoloading
- Refactor TwitchPress core to use namespaces for all new and refactored classes (e.g., `TwitchPress\Core\`).
- Move to Composer-based PSR-4 autoloading for all classes in TwitchPress, matching Pro and WPSeed.
- Ensure all new code in Pro and WPSeed uses namespaces and Composer autoloading.

## 2. File Structure & Organization
- Move all core logic in TwitchPress to `src/` or `includes/` with clear subfolders by feature.
- Keep plugin root for bootstrap/loader files only.
- Paid features should live in Pro, with only hooks/integration points in core.
- WPSeed should only provide generic, reusable boilerplate/utilities.

## 3. Plugin Bootstrap & Constants
- Standardize constant naming across all plugins:
  - `TWITCHPRESS_VERSION`, `TWITCHPRESS_PLUGIN_DIR_PATH`, etc.
  - Use the same pattern for Pro and WPSeed.

## 4. Core vs. Extension Responsibilities
- WPSeed: Only generic utilities/boilerplate, no Twitch-specific logic.
- TwitchPress: All Twitch-related core logic, hooks, and extension points.
- TwitchPress Pro: Only premium/paid features, using hooks/filters to extend core.
- Move generic utilities from TwitchPress/Pro to WPSeed if not Twitch-specific.
- Move all Twitch-specific logic out of WPSeed and into TwitchPress core.
- Pro should only “plug in” new features, not duplicate/override core logic except via hooks.

## 5. Coding Standards
- Adopt strict types, type hints, and return types in all new/refactored code.
- Use PHP_CodeSniffer or similar to enforce PSR-12 or WordPress coding standards.
- All new code should follow modern PHP best practices.

## 6. Internationalization
- Ensure all strings are wrapped in `__()` or `_e()` and use the correct text domain.
- Maintain `Domain Path` and text domain consistency in all plugin headers.

## 7. Testing & Examples
- Add or move tests/examples for core features into TwitchPress, and for premium features into Pro.
- WPSeed should only have generic test/example code.

## 8. Documentation
- Add/expand documentation in TwitchPress core, especially for extension points and hooks.
- Ensure Pro and WPSeed have clear docs for their own features and integration points.

## Next Steps
1. Begin refactoring TwitchPress core to use namespaces and Composer autoloading.
2. Move generic utilities to WPSeed, and Twitch-specific logic to TwitchPress.
3. Ensure Pro only contains premium features and uses hooks/filters for integration.
4. Standardize constants and file structure across all plugins.
5. Enforce coding standards and add/expand documentation.

---
This plan should be reviewed and updated as work progresses. Each step can be broken down into actionable tasks for implementation and tracked in project management tools as needed.

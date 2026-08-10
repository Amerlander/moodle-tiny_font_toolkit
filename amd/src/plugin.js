// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * tiny_font_toolkit for Moodle.
 *
 * @module      tiny_font_toolkit/plugin
 * @copyright   2026 Calliope gGmbH
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

import {getTinyMCE} from 'editor_tiny/loader';
import {getPluginMetadata} from 'editor_tiny/utils';

import {getSetup as getCommandSetup} from './commands';
import {component, pluginName} from './common';
import * as Configuration from './configuration';
import * as Options from './options';

// eslint-disable-next-line no-async-promise-executor
export default new Promise(async(resolve) => {
    // PluginManager.add does not support asynchronous configuration, so
    // anything awaited must be awaited before it is called.
    const [tinyMCE, pluginMetadata, setupCommands] = await Promise.all([
        getTinyMCE(),
        getPluginMetadata(component, pluginName),
        getCommandSetup(),
    ]);

    tinyMCE.PluginManager.add(pluginName, (editor) => {
        Options.register(editor);
        setupCommands(editor);

        return pluginMetadata;
    });

    resolve([pluginName, Configuration]);
});

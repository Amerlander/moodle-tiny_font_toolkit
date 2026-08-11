<?php
// This file is part of Moodle - http://moodle.org/
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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * A textarea setting that keeps its default out of the way.
 *
 * @package     tiny_font_toolkit
 * @author      Juri Wolf
 * @copyright   2026 Calliope gGmbH
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace tiny_font_toolkit;

/**
 * Textarea setting whose default sits behind a disclosure triangle.
 *
 * Core prints the whole default under the field. For lists that run to ten or
 * twelve lines, repeated under four fields, that is most of the page. This shows
 * the same text inside a collapsed <details> instead.
 */
class admin_setting_list extends \admin_setting_configtextarea {
    /** @var string Column count, since the parent keeps its copy private. */
    protected $listcols;

    /** @var string Row count, since the parent keeps its copy private. */
    protected $listrows;

    /**
     * Constructor.
     *
     * @param string $name
     * @param string $visiblename
     * @param string $description
     * @param mixed $defaultsetting
     * @param mixed $paramtype
     * @param string $cols
     * @param string $rows
     */
    public function __construct($name, $visiblename, $description, $defaultsetting,
            $paramtype = PARAM_RAW, $cols = '60', $rows = '8') {
        $this->listcols = $cols;
        $this->listrows = $rows;
        parent::__construct($name, $visiblename, $description, $defaultsetting, $paramtype, $cols, $rows);
    }

    /**
     * Render the field.
     *
     * The body matches the parent's apart from the default, which moves from
     * core's "Default:" block into the description. Moodle 4.1 through 5.2 build
     * this template context identically, so the copy is safe across the versions
     * this plugin supports.
     *
     * @param string $data
     * @param string $query
     * @return string
     */
    public function output_html($data, $query = '') {
        global $OUTPUT;

        $context = (object) [
            'cols' => $this->listcols,
            'rows' => $this->listrows,
            'id' => $this->get_id(),
            'name' => $this->get_full_name(),
            'value' => $data,
            'forceltr' => $this->get_force_ltr(),
            'readonly' => $this->is_readonly(),
        ];
        $element = $OUTPUT->render_from_template('core_admin/setting_configtextarea', $context);

        // Null suppresses core's own default block; the disclosure carries it.
        return format_admin_setting(
            $this,
            $this->visiblename,
            $element,
            $this->description . $this->default_disclosure(),
            true,
            '',
            null,
            $query
        );
    }

    /**
     * Build the collapsed block holding the shipped default.
     *
     * Blank lines around it keep markdown_to_html() treating it as raw HTML
     * rather than reflowing the list, whose pipe characters would otherwise read
     * as table syntax.
     *
     * @return string
     */
    protected function default_disclosure(): string {
        $default = $this->get_defaultsetting();
        if ($default === null || trim((string) $default) === '') {
            return '';
        }

        return "\n\n<details><summary>" . get_string('showdefault', 'tiny_font_toolkit')
            . '</summary><pre class="mt-2 mb-0">' . s($default) . "</pre></details>\n\n";
    }
}

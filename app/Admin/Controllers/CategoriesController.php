<?php

namespace App\Admin\Controllers;

use App\Models\GoodsCategory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Show;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;
use Encore\Admin\Tree;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Collapse;

class CategoriesController extends AdminController
{
    use ModelTree, AdminBuilder;
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '分类';


    /**
     * 首页
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content->title('分类')
            ->description('列表')
            ->row(function (Row $row){
                // 显示分类树状图
                $row->column(6, $this->treeView()->render());

                $row->column(6, function (Column $column){
                    $form = new \Encore\Admin\Widgets\Form();
                    $form->text('name', __('分类名称'));
                    $form->select('pid', '父级分类')->options(GoodsCategory::selectOptions(null, '根目录'));
                    $form->number('level', __('分类等级'))->default(1);
                    $form->number('status', __('分类状态0-禁用 1-启用'));
                    $form->action(admin_url('goods-categories'));
                    $form->hidden('_token')->default(csrf_token());
                    $column->append((new Box(__('新增分类'), $form))->style('success'));
                });

            });
    }
    /**
     * 树状视图
     * @return Tree
     */
    protected function treeView()
    {
        return  GoodsCategory::tree(function (Tree $tree){
            $tree->disableCreate(); // 关闭新增按钮
            $tree->branch(function ($branch) {
                return "<strong>{$branch['name']}</strong>"; // 标题添加strong标签
            });
        });
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GoodsCategory());

        $grid->column('id', __('Id'));
        $grid->column('name', __('分类名称'));
        $grid->column('pid', __('父级Id'));
        $grid->column('level', __('分类等级'));
        $grid->column('status', __('分类状态0-禁用 1-启用'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(GoodsCategory::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('pid', __('Pid'));
        $show->field('level', __('Level'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new GoodsCategory());

        $form->text('name', __('分类名称'));
//        $form->number('pid', __('父级Id'));
        $form->select('pid', '父级分类')->options(GoodsCategory::selectOptions(null, '根目录'));
        $form->number('level', __('分类等级'))->default(1);
        $form->number('status', __('分类状态0-禁用 1-启用'));

        return $form;
    }
}

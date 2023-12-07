from flask import Blueprint, render_template, request, flash, redirect, url_for
from .models import User, Groups, GroupMembers
from werkzeug.security import generate_password_hash, check_password_hash
from . import db   ##means from __init__.py import db
from flask_login import login_user, login_required, logout_user, current_user
from flask import jsonify


auth = Blueprint('auth', __name__)


@auth.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        email = request.form.get('email')
        password = request.form.get('password')

        user = User.query.filter_by(email=email).first()
        if user:
            if check_password_hash(user.password, password):
                flash('Logged in successfully!', category='success')
                login_user(user, remember=True)
                return redirect(url_for('views.home'))
            else:
                flash('Incorrect password, try again.', category='error')
        else:
            flash('Email does not exist.', category='error')

    return render_template("login.html", user=current_user)


@auth.route('/logout')
@login_required
def logout():
    logout_user()
    return redirect(url_for('auth.login'))


@auth.route('/sign_up', methods=['GET', 'POST'])
def sign_up():
    if request.method == 'POST':
        email = request.form.get('email')
        first_name = request.form.get('firstName')
        password1 = request.form.get('password1')
        password2 = request.form.get('password2')

        user = User.query.filter_by(email=email).first()
        if user:
            flash('Email already exists.', category='error')
        elif len(email) < 4:
            flash('Email must be greater than 3 characters.', category='error')
        elif len(first_name) < 2:
            flash('First name must be greater than 1 character.', category='error')
        elif password1 != password2:
            flash('Passwords don\'t match.', category='error')
        elif len(password1) < 7:
            flash('Password must be at least 7 characters.', category='error')
        else:
            new_user = User(email=email, first_name=first_name, password=generate_password_hash(
                password1, method='sha256'))
            db.session.add(new_user)
            db.session.commit()
            login_user(new_user, remember=True)
            flash('Account created!', category='success')
            return redirect(url_for('views.home'))

    return render_template("sign_up.html", user=current_user)


@auth.route('/index')
@login_required
def index():
    # Get the groups the current user is a member of
    user_groups = GroupMembers.query.filter_by(user_id=current_user.id).all()

    return render_template('index.html', user_groups=user_groups)


@auth.route('/create_group', methods=['GET', 'POST'])
@login_required
def create_group():
    if request.method == 'POST':
        group_id = request.form['post_groupid']
        group_name = request.form['post_groupname']

        try:
            from website.models import Groups
            new_group = Groups(group_id=group_id, group_name=group_name)
            db.session.add(new_group)
            db.session.commit()
            return jsonify({'redirect': url_for('views.home')})
        except Exception as e:
            db.session.rollback()
            return jsonify({'error': f"Error creating group: {str(e)}"})

    return render_template('index.html')


@auth.route('/join_group', methods=['POST'])
@login_required
def join_group():
    group_id = request.form.get('post_groupid')

    # Check if the group exists
    group = Groups.query.filter_by(group_id=group_id).first()
    if not group:
        return jsonify({'error': 'Group not found'})

    # Check if the user is already a member of the group
    if GroupMembers.query.filter_by(user_id=current_user.id, group_id=group.group_id).first():
        return jsonify({'error': 'You are already a member of this group'})

    # Add the user to the group
    try:
        new_membership = GroupMembers(user_id=current_user.id, group_id=group.group_id)
        db.session.add(new_membership)
        db.session.commit()
        return redirect(url_for('auth.index'))  # Redirect to index.html

    except Exception as e:
        return jsonify({'error': f"Error joining group: {str(e)}"})

